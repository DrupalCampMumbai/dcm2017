# dcm2017
Drupal Camp Mumbai 2017

# Using Acquia Cloud with a remote repository
If you use Git, you may want to host your Git repository at GitHub or on Bitbucket to take advantage of their excellent Git support, pull requests with integrated code review, and use other features. You can easily keep your website’s code in GitHub or Bitbucket and still host it on Acquia Cloud. You can do this by setting up two remotes for your local repository clone, one at GitHub or Bitbucket, and one at Acquia Cloud.

# Using GitHub with Acquia Cloud
The first step is to create two remote repositories. Suppose you have an existing repository at GitHub containing your website’s code. Use the following commands to make a local clone:

- git clone git@github.com:me/mysite.git
- cd mysite
- git remote -v
- origin  git@github.com:me/mysite.git (fetch)
- origin  git@github.com:me/mysite.git (push)
- GitHub is the "origin" remote, the default location for git push and git pull.

To deploy this code to Acquia Cloud, add your Acquia Cloud repository as an additional remote, named something short, like ac, and then do an initial git push --force ac to reinitialize the Acquia Cloud repository. To find the URL of your Acquia Cloud repository, click Git URL in the upper right region of the Cloud UI.

- git remote add ac mysite@svn-18.devcloud.hosting.acquia.com:mysite.git
- git remote -v

 origin  git@github.com:me/mysite.git (fetch)
 origin  git@github.com:me/mysite.git (push)
 ac  mysite@svn-18.devcloud.hosting.acquia.com:mysite.git (fetch)
 ac  mysite@svn-18.devcloud.hosting.acquia.com:mysite.git (push)

- git push --force ac
Now you have two remotes, origin (GitHub) and ac (Acquia Cloud).

# Pushing changes
After you have set up your two remote repositories, keep them in sync by pushing local changes to both GitHub and Acquia Cloud. You can edit some files and push them to GitHub:

- vi somefile.php
- git add somefile.php
- git commit -m ‘edited somefile.php’
- git push origin master
You can also push the same changes to Acquia Cloud:

- git push ac master
Your new code is now in both your GitHub and Acquia Cloud repository and is running on your Acquia Cloud website.

# Synchronizing release tags
Suppose that now you deploy your code on Acquia Cloud from the Development environment (running the master branch) to Production. This creates a new release tag in your Acquia Cloud repository that shows you exactly what code you deployed that day. You do not have to synchronize that release tag to GitHub, but you can:

- git pull ac
From svn-18.devcloud.hosting.acquia.com:mysite
* [new tag]  2012-03-12 -> 2012-03-12

- git push --tags
Now your GitHub repository contains the same release tag as your Acquia Cloud repository.


