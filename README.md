


## About MacPaw test task

all test tasks is done:


## Quick start

1. Clone project from [repository](https://github.com/igotiss/MacPaw_test_task).
2. Run `composer install` in terminal
3. Rename `.env.example` to `.env` and updated it with your database credentials
4. Run the command `./vendor/bin/sail up` in the terminal
5. Run `./vendor/bin/sail artisan key:generate`
6. Run `./vendor/bin/sail artisan migrate`
7. Run `npm install`
8. Run `npm run dev` and enjoy!


## Checks the tasks

1. Go to the route / (for default  root is 0.0.0.0/)
2. Look to the  [migration create_near_earth_objects_table](https://github.com/igotiss/MacPaw_test_task/blob/master/database/migrations/2022_07_22_125215_create_near_earth_objects_table.php)
3. Go to the route /neo/hazardous
4. Go to the route /neo/fastest?hazardous=true and /neo/fastest?hazardous=false
5. Go to the route /nasa/get


Developed by [Igor Tyshchenko](mailto:igotiss@gmail.com)
