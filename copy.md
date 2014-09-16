# September 17, 2014: Week 2 - Git 

* [Link to live stream (when live)]()
* [Link to recording (when done)]()

## Summary
You have already:

- Set up Git
- Set up Github
- Set up a Repository
- git add, git push, git commit

This Section:

- Branching
- Checkout
- Merging
- Merge Conflicts
- Stashing


## Outline
###Branching:

Goals: 
- Learn how to split off from the default branch (usually master)
- Learn how to make changes on another branch
- Be able to checkout between branches 

One way to achieve the results of branching would be to create a copy of your code, put it into a second directory, edit that, and merge it later. Git makes this much easier.

git branch doesn’t move you to a new branch: it only creates a new branch.

```bash
$ git branch
```

Use checkout to move to a new branch. If you make changes and commit from this branch, your master branch will still be pointing at the previous snapshot of your code, the one you were on before you used git checkout.

```bash
$ git checkout (insert your branch name here, without parenthesis)
```
or use

```bash
$ git checkout -b (name of branch) - for automatic creation and switch
```

After edits are made and commited, checkout back to the master branch.

```bash
$ git checkout master
```

###Merging and Merge Conflicts:

We can merge a branch we’re working on with the master branch.

```bash
$ git merge (name of branch to merge)
```

We can pull changes from the master branch to a branch that we are working on

```bash
$ git merge master
```

You can delete an old branch.

```bash
$ git branch -d (branch name)
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
