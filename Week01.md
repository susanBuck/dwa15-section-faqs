# September 10, 2014: Week 1 - Command Line

* [Link to live stream (when live)]()
* [Link to recording (when done)]()

## Summary
Why use the command line?

- Working on remote servers is unavoidable.
- Using command line tools will speed you up considerably and give you access to otherwise hidden folder information.

OS X and other UNIX/Linux systems are inherently multi-user systems.

When you open terminal you are auto-logged into unix as your current user. Terminal is an interface for bash, and is able to interact with the UNIX kernel (core of the operating system).

The anatomy of a command-line tool:

hostname:directory username$  command + options [arguments] + arguments

1) command (name of the program) 

2) options (in the form of flags - modify the behavior of the command in some way)
    - note: options can have their own arguments
    - banner -w 50 DWA15

3) arguments - the things that you are operating on, whether it be a file, text or address
example: 

## Outline
###Shortcuts:

- Up arrow/down arrow to show previous commands that have been used. Great for speeding up repetitive tasks.

- When you are typing a file or directory name, press the tab button to complete the filename if it already exists. If there are two similarly named files, pressing tab tab will show you the different options you have.

- Control+a will move your cursor to the beginning of the line
- Control+e will move your cursor to the end of the line
- Option+click will sometimes let you jump to a specific point in terminal on a Mac
- Control+z will almost always exit from the current operation or program you are in

###Commands:

At any time the ‘clear’ command will clear out the terminal space and give you a clean prompt.

You can use ‘man commandName’ at any time to find out information about a specific command

$ pwd - present working directory

$ ls - list directory contents

e.g.,
"ls -a -l -h” path  (-a shows hidden files, -l makes a list of the files, -h shows a readable file size)

The flags above -a -l -h can be concatenated into -alh, in any order.

cd - change directory

- the . and .. within each directory hold references to the current directory and the previous directory. You can use these anywhere a path is used.

- files that start with a . are hidden configuration files

the / character denotes the base directory and also separates directory names
the ~ character represents your user’s root directory

$ cd .. (goes back one directory)
$ cd /path/to/directory (goes to new  directory)

$ mkdir directoryname - make a new directory

$ touch filename.txt - create a new empty file named filename.txt

$ rm filename.txt - remove a file
$ rm -rf directoryname - remove a directory and all of its contents, -r for recursive and -f for force

$ mv filename /newpath/ - moves a file to a new path
$ mv filename filenametwo - renames a file (this is more powerful and more consistent than rename)
- when renaming a file you can also change the directory of that file

###Editors:

vi -> vim
pico -> nano
emacs

use an editor by ‘pico filename.txt’ or ‘vim filename.txt’

Viewing file contents:

cat - good for showing short files
less - good for showing longer files, allows you to page through and starts at the beginning
head - shows just the few top lines of a file
tail - shows the ending lines of a file (good for log files, can be specified to show live updates to the file)

###Permissions:

When you view ‘cd / ; ls -al’ you will see that the file ownership column will display ‘root’ which is the admin user within the system. If you go to your user’s root directory with ‘cd ~; ls -al’ you will see your current username as the owner of files, with an exception for the .. reference to the previous folder. 

The chown command will allow you to change the ownership of files ‘chown filename.txt’. If you are trying to specify ‘root’ as the new file owner, or changing a file from root to your current user, you will need to preface your command with ‘sudo’.

sudo - super user do will bypass permissions checks after you input your computer’s password:

$ sudo chown root filename.txt 
sudo is often needed when changing global configuration files outside of your current user’s directory path

cp - copy a file to a new filename

$ cp currentFile.txt newFileCopy.txt

###Grep and Piping:

Grep is a tool used for searching for strings in a text file. It is commonly used in conjunction with the | and > commands, which allow you to reroute data from one tool to another.

Look for files made in august:
ls -la | grep ‘Aug’
Look for jpg files by extension:
ls -la | grep -i ‘.jpg’
Look for line in a file:
Grep ‘[search term]’ [filename1] [filename2] …
Look for line in all files in a folder (using recursion)
grep -R ‘[searchterm]’ [path such as ./ for current dir]

Write output to a file:
ls -la > fileList.txt
cat fileList.txt

Search file with grep, save result in file
grep ‘invalid username’ logfile.log > usernameErrors.log
or use >> to append
cat usernameErrors.log to show output

## References