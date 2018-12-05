IN ORDER TO GENERATE DATABASE WITH DATA FOLLOW THIS STEPS:
1. Run scripts in order from 0001 to 0011.
2. Uncomment lines from 357 to 359 (annotation) in "Generator.php" file.
3. Change parameters in lines 34-35 to set period in which data will be generated.
4. Change parameter "memory_limit" in php.ini file to "-1".
5. Go to page "/generator" in WorkersApp.
6. Wait until page loads.
7. Comment lines from 357 to 359 (annotation) in "Generator.php" file.

If you want empty database run script "0001_db_create.sql".