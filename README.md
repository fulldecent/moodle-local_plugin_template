# Moodle plugin template

Use this template as a starting point for any Moodle plugin that you want other people to install.

<mark>STATUS: This is a work in progress and supports a discussion of best practices.</mark>

![File listing](docs/images/file-listing.png)

## Features

Your new Moodle plugin will immediately have working code, a build system and implement these best practices which all modules should use:

- [x] Playground and install instructions for people using your plugin
- [x] Automated tests that run on GitHub Actions
- [x] Localization for all strings
- [x] Automated code style checks
- [ ] Unit tests for all classes
- [ ] Behat tests for all features
- [ ] Automated code coverage checks
- [ ] Automated static analysis checks
- [ ] Logging for all actions
- [ ] Backup and restore support

This repository is a fully-functioning plugin demonstrating the best practices by implementing toy functionality with many features your own plugin might need. You can rip these features out or modify them. But if you need these kinds of features, there are implemented here as an example, including references to best practices.

- [ ] **Database initialization and upgrade** scripts
- [ ] **Dashboard Context block** (`CONTEXT_USER`) to display content on student dashboards ("My home")
- [ ] **Course content block** (`CONTEXT_COURSE`) to display content on course pages
- [ ] **Activity block** (`CONTEXT_MODULE`) to display content on activity pages
- [ ] **Settings page** to configure the plugin using the standard Moodle admin settings interface
- [ ] **Admin page** to access functionality of this plugin that only administrators should see
- [ ] **Scheduled task** to run background processing
- [ ] **Custom JavaScript** for the user interface, which is built using (AMD??)

## Index of best practices to review

Here are further best practices to review which may help when we are implementing the remaining checkboxes above.

- how to compile JS https://moodledev.io/general/development/tools/nodejs
- how to compile AMD
  -  https://github.com/h5p/moodle-mod_hvp
  -  https://github.com/danmarsden/moodle-mod_attendance/tree/MOODLE_404_STABLE/amd
- install notes https://moodledev.io/general/development/tools/nodejs
- build strategy https://github.com/marcusgreen/moodle-qbank_bulktags/blob/main/.github/workflows/moodle-ci.yml
  - https://moodlehq.github.io/moodle-plugin-ci/
- best practices
  - https://github.com/danmarsden/moodle-mod_attendance
  - Use this template as a starting point for any Moodle plugin that you want other people to include in their projects.

MARKETING:

- Post to https://moodle.org/mod/forum/discuss.php?d=462107#p1855356
- Post to https://github.com/sebsoftnl/moodle-block_coupon/issues/24
- Post to new Moodle forum thread




## Make your own plugin

Here is what you need to do to make your own Moodle plugin:

- [ ] Fork this repository:
  - The name of your repository must follow the format `moodle-<type>_<pluginname>`:
    - `<type>` is one of the "component names" listed in the [Moodle plugin types documentation](https://moodledev.io/docs/apis/plugintypes)
    - `<pluginname>` begins with a lowercase letter; followed by lowercase letters, numbers and underscores (but no consecutive underscores); and ends with a lowercase letter or number (as per [requirements](https://moodledev.io/docs/apis/plugintypes))
    - We do not see documentation that this exact repository name is required, nor [consistent usage in the wild](https://github.com/search?q=path%3A%2Fdb%2Finstall.xml&type=code&ref=advsearch), nevertheless we assert this is best practice.
- [ ] Edit the README contents below, starting at "High Five plugin" to describe your product instead of the High Five product.
- [ ] Delete this line from your README and everything above it. Publish your repository. Release version 1.0.0!

---

---

---

# High Five plugin

Allow your students to high five! Make new friends and engage, engage, engage!

Supported Moodle versions: [![ci](https://github.com/fulldecent/moodle-local_plugin_template/actions/workflows/ci.yml/badge.svg)](https://github.com/fulldecent/moodle-local_plugin_template/actions/workflows/ci.yml)

## Features

Here's what you get with *High Five*:

* :raised_hand_with_fingers_splayed: A high five page available on your site at /local/high_five/

  <img src="docs/images/screenshot-1.jpg" width=400>

## Quick start playground

:runner: Run a Moodle playground site with *High Five* on your own computer in under 5 minutes! Zero programming or Moodle experience required.

1. Install a Docker system:

   1. On macOS we currently recommend [OrbStack](https://orbstack.dev/). This is the only software which can install Moodle in under 5 minutes. We would prefer if an open source product can provide this experince, but none such exists. See [references](#references) below if you may prefer another option.
   2. On Windows (TODO: add open source recommendation)
   3. On Linux (TODO: add open source recommendation)

2. Create a Moodle testing folder. You will use this to test this plugin, but you could also mix in other plugins onto the same system if you like.

   ```sh
   cd ~/Developer
   mkdir moodle-playground && cd moodle-playground
   ```

3. Install the latest version of Moodle:

   ```sh
   # Visit https://moodledev.io/general/releases to find the latest release, like X.Y.
   
   export BRANCH=MOODLE_X0Y_STABLE # update X and Y here to match the latest release version
   git clone --depth=1 --branch $BRANCH git://git.moodle.org/moodle.git
   ```

   *:information_source: If you see the error "fatal: Remote branch MOODLE_X0Y_STABLE not found in upstream origin", please reread instruction in the code comment and try again.*

4. Install this plugin into your Moodle playground:

   ```sh
   git clone https://github.com/fulldecent/moodle-local_plugin_template.git moodle/local/high_five
   ```

5. Get and run Moodle Docker container (instructions adapted from [moodle-docker instructions](https://github.com/moodlehq/moodle-docker)):

   ```sh
   git clone https://github.com/moodlehq/moodle-docker.git
   cd moodle-docker # You are now at ~/Developer/moodle-playground/moodle-docker
   
   export MOODLE_DOCKER_WWWROOT=../moodle
   export MOODLE_DOCKER_DB=pgsql
   bin/moodle-docker-compose up -d
   bin/moodle-docker-wait-for-db
   
   cp config.docker-template.php $MOODLE_DOCKER_WWWROOT/config.php
   bin/moodle-docker-compose exec webserver php admin/cli/install_database.php --agree-license --fullname="Docker moodle" --shortname="docker_moodle" --summary="Docker moodle site" --adminpass="test" --adminemail="admin@example.com" --adminuser='admin'
   ```

   *:information_source: If you see the error "Database tables already present; CLI installation cannot continue", please follow the "teardown" instructions below and then try again.*

   *:information_source: If you see the error "!!! Site is being upgraded, please retry later. !!!", and "Error code: upgraderunning…", please ignore the error and proceed.*

6. :sun_with_face: Now play with your server at https://localhost:8000

   1. Click the top-right to login.
   2. Your username is `admin` and your password is `test`.

   *:information_source: If you see a bunch of stuff and "Update Moodle database now", then click that button and wait. On a M1 Mac with 8GB ram, we saw this take 5 minutes for the page to finish loading.*

7. To completely kill your playground so that next time you will start with a blank slate:

   ```sh
   bin/moodle-docker-compose down --volumes --remove-orphans
   colima stop
   ```

If you have any further questions about the playground setup, customizing it or other error messages, please documentation at https://github.com/moodlehq/moodle-docker and contact that team.

## Install

To install High Five on your quality assurance server or your production server, do the same thing as the plaground example above:

1. ```sh
   git clone https://github.com/fulldecent/moodle-local_plugin_template.git local/high_five
   ```

2. Load your website in the browser to set up plugins.

## References

1. This module is built based on [best practices documented in moodle-local_plugin_template](https://github.com/fulldecent/moodle-local_plugin_template).
2. Setting up Docker
   1. We would prefer an open-source-licensed Docker implementation that runs at native speed on Mac, Linux and Windows. For Mac, you may prefer to [install Colima](https://github.com/abiosoft/colima?tab=readme-ov-file#installation) which is open source but about 5x slower than the OrbStack recommended above.
3. Setting up playground
   1. If you require a few courses and users to test your plugin, you may want to look at the [generator tool](https://moodledev.io/general/development/tools/generator).
4. Continuous integration
   1. This plugin uses [the Moodle CI suite recommended by Catalyst](https://github.com/catalyst/catalyst-moodle-workflows)
   2. Perhaps we would prefer the CI suite provided by Moodle, but their approach [does not allow you to set it once and forget it](https://github.com/moodlehq/moodle-plugin-ci/issues/323)