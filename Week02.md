# September 17, 2014: Week 2 - Git 

## Summary
You have already:

- Set up Git
- Set up Github
- Set up a Repository
- Learned to use `git add, git push`, and `git commit`

In this section we will cover:

- Branching
- Checkout
- Merging (your own branches, and changes made by teammates)
- Merge conflicts
- Stashing

These techniques will probably not be necessary for your class projects, but they demonstrate more of the power of Git, and will become useful as you work on larger projects and with collaborators.

## Outline
###Branching:

Goals: 
- Learn how to split off from the default branch (usually master)
- Learn how to make changes on another branch
- Be able to switch between ('checkout') branches 

One way to achieve the results of branching would be to create a copy of your code, put it into a second directory, edit that, manually incorporate the changes later, then delete that second directory. Git makes this much easier.

To create a new branch:

```bash
$ git branch new-branch
```

This command doesn’t move you to a new branch: it only creates a new branch. Use the same command with no branch name to list your branches:

```bash
$ git branch
* master
  new-branch
```

The asterisk marks the branch you are currently working in.

Use checkout to move to the new branch. If you make changes and commit from this branch, your master branch will still be pointing at the previous snapshot of your code, the one you were on before you used git checkout.

```bash
$ git checkout new-branch
```

You can also create a new branch and switch to it in one command with:

```bash
$ git checkout -b new-branch
```

After edits are made and commited, checkout back to the master branch.

```bash
$ git checkout master
```

Once you've returned to the master branch, check out the file you changed in your new branch in a text editor. Your edits aren't there! But if you switch back to your new branch, the edits will reappear. 

###Merging and Merge Conflicts:

Once you're happy with all the edits you've made in your branch, you'll probably want to merge them in to your master branch. When merging, make sure you are in the branch you want to merge *to*. So from your master branch, run:

```bash
$ git merge new-branch
```

Alternately, if you wanted to pull changes from the master branch to your new branch, you would check out your new branch, then run:

```bash
$ git merge master
```

Once you've merged your changes into the master branch, and no longer need the development branch, delete it using:

```bash
$ git branch -d new-branch
```

If you have changed the same part of a file in the two branches you intend to merge together, there will be a merge conflict, which Git will report to you:

```bash
$ git merge new-branch
Auto-merging hello.html
CONFLICT (content): Merge conflict in hello.html
Automatic merge failed; fix conflicts and then commit the result.
```

Running `git status` will give you more information:

```bash
$ git status
# On branch master
# Your branch is ahead of 'origin/master' by 19 commits.
#   (use "git push" to publish your local commits)
#
# You have unmerged paths.
#   (fix conflicts and run "git commit")
#
# Unmerged paths:
#   (use "git add <file>..." to mark resolution)
#
#       both modified:      hello.html
#
no changes added to commit (use "git add" and/or "git commit -a")
```

If you open the file where the conflict occurred ('hello.html' in this case), you will see that Git has notated the conflicting sections. The first section shows the line(s) as they appear on the branch you are merging *into* ('HEAD'), and the section section (after the '=======') shows the lines as they appear on the branch you are merging *from*.

```html
<<<<<<< HEAD
<p>Hello world!</p>
=======
<p>HELLO WORLD</p>
>>>>>>> new branch
```

To resolve the merge conflict, first deal with the conflicting lines within the file:

```html
<p>HELLO WORLD!</p>
```

Then add and commit the offending file:

```bash
$ git add hello.html

$ git commit -m "resolving Hello World conflict"
```

Check that the conflict is gone with git status.
```bash
$ git status
# On branch master
# Your branch is ahead of 'origin/master' by 20 commits.
#   (use "git push" to publish your local commits)
#
nothing to commit, working directory clean
```

###Pulling and Fetching:

So far we've shown the process of creating a local branch and then merging it into your master branch. When collaborating with teammates, you will also often need to retrieve their changes from a shared remote repository and merge those changes with your local repository.

If you try to push a commit to Github and the remote repository contains commits that you do not yet have in your local repo, Git will display an error message:

```bash
$ git push origin master
To git@github.com:teamAwesome/our-project.git
 ! [rejected]        master -> master (fetch first)
error: failed to push some refs to 'git@github.com:teamAwesome/our-project.git'
hint: Updates were rejected because the remote contains work that you do
hint: not have locally. This is usually caused by another repository pushing
hint: to the same ref. You may want to first merge the remote changes (e.g.,
hint: 'git pull') before pushing again.
hint: See the 'Note about fast-forwards' in 'git push --help' for details.
```

There are two commands that will retrieve those changes from the remote repository: `pull` and `fetch`. The first will perform two actions with one command: 1) get the changes from the remote repository, and 2) attempt to merge them into your local repository.

```bash
$ git pull origin
remote: Counting objects: 16, done.
remote: Compressing objects: 100% (15/15), done.
remote: Total 16 (delta 3), reused 11 (delta 1)
Unpacking objects: 100% (16/16), done.
From github.com:teamAwesome/our-project.git
   4507f48..839e848  master     -> origin/master
Auto-merging hello.html
Merge made by the 'recursive' strategy.
 hello.html | 3 +-
 1 file changed, 1 insertion(+), 1 deletion(-)
 ```

 If that merge fails, you'll get a merge error message just as we saw above when merging our own local branches, and will need to resolve it in the same way.

 The second option, `fetch`, allows you to retrieve remote changes and merge them with your local repo in two separate steps, giving you more control.

```bash
λ git fetch origin
remote: Counting objects: 3, done.
remote: Compressing objects: 100% (3/3), done.
remote: Total 3 (delta 0), reused 1 (delta 0)
Unpacking objects: 100% (3/3), done.
From github.com:teamAwesome/our-project.git
   0c24738..1a08bb6  master     -> origin/master
```

After running `fetch` you now have a special branch called `origin/master` which represents the state of the remote repository. You can then run a diff against your own local repository to see what the differences between the two versions are:

```bash
λ git diff master origin/master
diff --git a/hello.html b/hello.html
index ac77018..3addf7a 100644
--- a/hello.html
+++ b/hello.html
@@ -1,4 +1,4 @@
-<h1>Hello World!!!</h1>
+<h1>Hellooooooooo World!!!</h1>

<p>Welcome to our awesome project.</p>
```

If you see differences that are likely to cause merge conflicts, you can address them by editing your local code before merging in the remote changes.

When you are ready to merge the `origin/master` branch in, the syntax is the same as we already saw for a local branch:

```bash
$ git merge origin/master
Merge made by the 'recursive' strategy.
 hello.html | 2 +-
 1 file changed, 1 insertion(+), 1 deletion(-)
```


###Stashing:

If your work is in a state where you don’t want to commit (too messy, a bug, etc) but you need to work on another branch, you can save your current work using stash. Imagine you are in the middle of developing a new feature in a local branch, but suddenly you learn about an urgent bug on your live site. You need to hop over to your master branch to fix it and deploy the fix, but you aren't at a place in developing your new feature where you're ready for a commit. If you try to use checkout to switch branches while you have uncommitted changes in your current branch, one of two things will happen (depending on whether the state of the branch you are switching to will conflict with the edits in your current branch).

Either you will get an error message saying you cannot switch branches:

```bash
$ git checkout master
error: Your local changes to the following files would be overwritten by checkout:
        hello.html
Please, commit your changes or stash them before you can switch branches.
Aborting
```
Or git will let you switch, but your uncommitted changes will come with you:

```bash
$ git checkout master
M       hello.html
Switched to branch 'master'
```

In this second case, if you look at the file you edited, you'll see the changes you made in your development branch even though you're now on the master branch. That means you can't deploy your bug fix without also pushing your half-finished new feature live.

To solve this problem, you can use `git stash`. This command will save your uncommitted changes for you, and return your current branch to the state of its last commit. From your development branch:


```bash
$ git status
# On branch new-branch
# Changes not staged for commit:
#   (use "git add <file>..." to update what will be committed)
#   (use "git checkout -- <file>..." to discard changes in working directory)
#
#       modified:   hello.html
#
no changes added to commit (use "git add" and/or "git commit -a")

$ git stash
Saved working directory and index state WIP on new-branch: 1542edb added new section header
HEAD is now at 1542edb added new section header

$ git status
# On branch comments
nothing to commit, working directory clean

$ git checkout master
Switched to branch 'master'

```

With your working directory (current branch) clean, you can now switch to your master branch for your bug fix. When you're done and ready to continue work on your new feature, you can return to your development branch and use `git stash apply` to get your uncommitted edits back.

```bash
$ git checkout new-branch
Switched to branch 'new-branch'

$ git stash apply
# On branch new-branch
# Changes not staged for commit:
#   (use "git add <file>..." to update what will be committed)
#   (use "git checkout -- <file>..." to discard changes in working directory)
#
#       modified:   hello.html
#
no changes added to commit (use "git add" and/or "git commit -a")
```

NOTE: `stash` will only work for files git has already started tracking. If you add a brand new file on your development branch and run `git stash`, that file won't be stashed, and will remain in your branch. If you switch branches, it will come with you (and get committed if you use `git add --all` to stage after switching). If you've added new files, make sure to run `git add [filename]` to start tracking it before using `git stash`.