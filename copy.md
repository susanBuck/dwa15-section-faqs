# September 17, 2014: Week 2 - Git 

* [Link to live stream (when live)]()
* [Link to recording (when done)]()

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

##TEST EDITING!

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

If you have changed the same part of a file in the two branches you intend to merge together, there will be a merge conflict. 

Git will pause when you hit a merge conflict. If you want to see where the conflict is, use git status.

```bash
$ git status
```

Git will notate the file where the error occurred. 
To resolve this conflict, one strategy is to use git's merge tool. It will run through the conflicts for you.

```bash
$ git mergetool
```

Check that the conflict is gone with git status.
```bash
$ git status
```

###Stashing:

If your work is in a state where you don’t want to commit (too messy, a bug, etc) but you need to work on another branch, you can save your current work using stash.

```bash
$ git stash
```

You can show current stashes using the git stash list command.

```bash
$ git stash list
```

When you come back and want to reapply your stash, you can look using git stash list and apply using git stash apply. Git assumes that you mean the most recent stash, unless you specify a different stash by name.

```bash
$ git stash apply
```

To remove a sash, use git stash drop.

```bash
$ git stash drop (name of stash, no parenthesis)
```

