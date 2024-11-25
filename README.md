# Moodle Plugin Template

Use this template as a starting point to develop Moodle plugins.

**STATUS:** This is a work-in-progress, supporting discussions on best practices.

![File listing](docs/images/project-files.png)

## Key features

This template provides a structured, best-practice foundation for developing Moodle plugins, including:

- 📝 [Installation instructions](#quick-start-playground) for developers and users of your module
- 🔧 [Build system and CI/CD setup](#high-five-plugin) using GitHub Actions
- 🌍 [Localization](./lang) for all strings
- ✅ [Automated](./.github/workflows) code style checks, unit testing

### Functional Examples

This repository offers a functional example of a Moodle plugin, with features like:

- [x] **Database initialization and upgrade** scripts
- [x] **Settings page** to configure the plugin using the standard Moodle admin settings interface
- [x] **Admin page** to access functionality of this plugin that only administrators should see
- [x] **Scheduled task** to run background processing
- [x] **Custom JavaScript**: Demonstrates using AMD to load JavaScript in Moodle. Clicking the high-five emoji triggers a confetti effect, showcasing how to integrate JavaScript with Moodle.
- [x] **Unit test example** to ensure the plugin works as expected in the Catalyst CI system.
- [x] **Event logging Example** demonstrates how to log events in Moodle using the Events API.

You can use these features as they are, modify them, or remove what you don’t need.

***

## Best practices and resources

Follow these best practices to enhance and maintain your plugin:

- **JavaScript Compilation:** [Moodle Node.js Guide](https://moodledev.io/general/development/tools/nodejs)
- **AMD Compilation:** Examples:
  - [h5p plugin](https://github.com/h5p/moodle-mod_hvp)
  - [attendance plugin](https://github.com/danmarsden/moodle-mod_attendance/tree/MOODLE_404_STABLE/amd)
- **CI Setup:** [Moodle CI Guide](https://moodlehq.github.io/moodle-plugin-ci/)
- **General Examples:** [attendance plugin](https://github.com/danmarsden/moodle-mod_attendance)

***

## How to make your own plugin

1. **[Use this template/fork](https://github.com/new?template_name=moodle-local_plugin_template&template_owner=fulldecent)** and rename it according to Moodle conventions:
   - Format: `moodle-<type>_<pluginname>` (e.g., `moodle-local_example`)
   - `<type>` should match Moodle’s [plugin types](https://moodledev.io/docs/apis/plugintypes).

2. **Customize the README**: Update all content below this section to describe your plugin.

3. **Publish and release**: Remove this line and everything above, then publish your repository as version 1.0.0!

---

---

---

# High Five plugin

Enable students to "high five" each other! Enhance engagement and community.

Supported Moodle versions: ![CI status](https://github.com/fulldecent/moodle-local_plugin_template/actions/workflows/ci.yml/badge.svg)

## Features

### 🎉 High Five page at `/local/high_five/`

<img src="docs/images/greeting.png" width=400>  

### ⚙️ Admin Page and Settings Example

This plugin includes:

1. **Admin Settings**:
   - Access the settings at: `Site administration > Plugins > Local plugins > High Five`.
   - Enable/disable a feature via a checkbox in the admin settings page.

<img src="docs/images/settings.png" width=400>

2. **Custom Admin Page**:
   - Accessible only by site administrators.
   - Access the admin page at: `/local/high_five/adminpage.php`.

<img src="docs/images/admin-page.png" width=400>

### Files

- **`settings.php`**: Adds plugin settings and a link to the custom admin page.
- **`adminpage.php`**: Displays the custom admin page.

### Usage

1. Navigate to *Site administration > Plugins > Local plugins > High Five*.
2. Configure the settings or click the "Admin Page" link to access custom functionality.

***

## Quick start with playground

Set up a Moodle environment in minutes for testing your plugin locally:

### Steps

1. **Install Docker**:
   - Recommended for Mac: [OrbStack](https://orbstack.dev/)
   - Windows/Linux: (add recommended option)

2. **Prepare Moodle Directory**:

   ```sh
   cd ~/Developer
   mkdir moodle-playground && cd moodle-playground
   

## Quick start playground

:runner: Run a Moodle playground site with *High Five* on your own computer in under 5 minutes! Zero programming or Moodle experience required.

These instructions include code snippets that you will need to copy/paste into your command terminal. On macOS that would be Terminal.app, which is a software you already have installed.

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

   *These instructions include a workaround for [Moodle issue MDL-83812](https://tracker.moodle.org/browse/MDL-83812).*

4. Install the High Five plugin into your Moodle playground:

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

   *These instructions include a workaround for [moodle-docker issue #307](https://github.com/moodlehq/moodle-docker/issues/307).*

6. :sun_with_face: Now play with your server at <http://localhost:8000>

   1. Click the top-right to login.
   2. Your username is `admin` and your password is `test`.

   *:information_source: If you see a bunch of stuff and "Update Moodle database now", then click that button and wait. On a M1 Mac with 8GB ram, we saw this take 5 minutes for the page to finish loading.*

7. To completely kill your playground so that next time you will start with a blank slate:

   ```sh
   bin/moodle-docker-compose down --volumes --remove-orphans
   colima stop
   ```

If you have any further questions about the playground setup, customizing it or other error messages, please see [moodle-docker documentation](https://github.com/moodlehq/moodle-docker) and [contact that team](https://github.com/moodlehq/moodle-docker/issues).

## Install

Install High Five on your quality assurance or production server the same way as on the playground:

1. ```sh
   git clone https://github.com/fulldecent/moodle-local_plugin_template.git local/high_five
   ```

2. Load your website in the browser to set up plugins.

***

## Using AMD in This Plugin Template

The **High Five** plugin demonstrates how to integrate **AMD (Asynchronous Module Definition)** in Moodle to load JavaScript modules asynchronously, improving performance.

📢 For **non-developers** running the plugin:  
You don’t need to worry about the build process. Just use the already-built files.

### How It Works

1. **High Five Emoji & Confetti Effect**  
   When the high-five emoji (`🖐️`) is clicked at `/local/high_five/`, an AMD module is loaded, triggering a confetti effect.

<img src="docs/images/confetti.png" width=400>

2. **Build Process**
   - JavaScript code is written in the `amd/src/` folder and compiled into the `amd/build/` directory.
   - The built files in the `build` folder are used by Moodle, dynamically loaded when the emoji is clicked.

### 🎯 JavaScript Development Process

#### Building the AMD Module

To compile the AMD modules:

1. **Set up Grunt**  
   Follow the [Moodle Node.js tools documentation](https://moodledev.io/general/development/tools/nodejs) to install and configure **Grunt**.

2. **Run the Build Command**  
   After setting up Grunt, run:

   ```bash
   grunt
   ```

This will compile the AMD modules and place the final files in the `amd/build/` folder.  

If you face issues with CI during the build, refer to the [Catalyst README](https://github.com/catalyst/catalyst-moodle-workflows/tree/bbb7b5fba5f8304b8b07ad5534b666202d1751c8?tab=readme-ov-file#amd--grunt-bundling-issues) for troubleshooting tips.

#### Best practice for pushing build artifacts to GitHub

1. **Push Build Artifacts**
   - **When**: For production-ready plugins where users may not rebuild assets.
   - **Why**: Ensures consistent functionality across all environments, even for users who don't rebuild the plugin.

2. **Exclude Build Artifacts**
   - **When**: If the repository should stay lean, and CI systems handle builds.
   - **Why**: Keeps the repository clean and reduces its size, but requires users to build assets locally.

**Recommended**: For Moodle plugins, it's often easier to **push build artifacts** to GitHub to simplify deployment.

***

## Contributing

Please send PRs to our [main branch](https://github.com/fulldecent/moodle-local_plugin_template).

***

## References

1. This module is built based on [best practices documented in moodle-local_plugin_template](https://github.com/fulldecent/moodle-local_plugin_template).
2. Setting up Docker
   1. We would prefer an open-source-licensed Docker implementation that runs at native speed on Mac, Linux and Windows. For Mac, you may prefer to [install Colima](https://github.com/abiosoft/colima?tab=readme-ov-file#installation) which is open source but about 5x slower than the OrbStack recommended above.
3. Setting up playground
   1. If you require a few courses and users to test your plugin, you may want to look at the [generator tool](https://moodledev.io/general/development/tools/generator).
4. Continuous integration
   1. This plugin uses [the Moodle CI suite recommended by Catalyst](https://github.com/catalyst/catalyst-moodle-workflows)
   2. Perhaps we would prefer the CI suite provided by Moodle, but their approach [does not allow you to set it once and forget it](https://github.com/moodlehq/moodle-plugin-ci/issues/323)
5. JavaScript Modules in Moodle. For best practices on how to use JavaScript modules in Moodle,
including the use of AMD for asynchronous loading, check the [Moodle JavaScript Modules Documentation](https://moodledev.io/docs/4.5/guides/javascript/modules).
