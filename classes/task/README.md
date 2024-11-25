# Scheduled task to run background processing

## Overview
This plugin includes a scheduled task to process background operations.

## Task Class
The task class `\local_high_five\task\process_high_fives` is defined in `classes/task/process_high_fives.php`.

### Key Features
- **Automated Execution:** Runs at specified intervals based on the cron schedule.
- **Custom Logic:** Contains functionality to process "high five" data.

## Configuration
1. **Task Definition:** Ensure the task is defined in `db/tasks.php`.
2. **Version Update:** Update the plugin's version in `version.php` to register changes.

## Usage
1. View tasks under `Site administration > Server > Scheduled tasks`.
2. Execute manually (CLI):
   ```bash
   php admin/cli/scheduled_task.php --execute="\local_high_five\task\process_high_fives"

![Process High Fives Task](/docs/images/task.png)

## References

- [Moodle Scheduled Tasks Documentation](https://docs.moodle.org/405/en/Scheduled_tasks)
- [Moodle Task API](https://moodledev.io/docs/4.5/apis/subsystems/task/scheduled)
