# Notes

## Run Me
1. Clone the repository.
2. Run `composer install` to install PHP dependencies.
3. Copy `.env.example` to `.env` and configure your database settings.
4. Run `php artisan key:generate` to generate the application key.
5. Run `php artisan migrate --seed` to set up the database and seed it with initial data.
6. Start the development server with `php artisan serve`.

## Todo
Todo list can be found in TODO.md file.

## Tailwind Blocks/Elements
I have used some standard elements from https://www.hyperui.dev/ to speed up development, mainly for forms and tables, to give the application a bit of structure.

## Considerations

### Database 
The database used is SQLite. For production use, this would typically be a more robust database like MySQL or PostgreSQL, but SQLite is sufficient for development and testing purposes.

### Authentication
I've used Laravel Fortify for authentication, which provides a simple and secure way to handle user registration, login, and password management.

### Routes
I've organised routes using route groups and middleware, everything is under `/dashboard` prefix and protected by auth middleware.

### Branding
Just for a bit of creative flair 💃, I've used a Cloud Construct-like logo with Tailwind blue colours.

### Navigation
I've kept the navigation simple with links to the main sections: Dashboard and Exams, everything under exams (bookings and results) are managed within the exam views for better context. 

### Dashboard
In the theme of Cloud Construct I've added some bird's eye statistics to the dashboard for quick insights. The dashboard also houses the upcoming exams list.

### Users/Candidates
I've set users to be generated via a seeder for ease of testing and added a custom admin@admin.com user login for admin access (although you can register as an admin too, this has been added to the TODO to set roles and wouldn't typically have open registration for admins).

Candidates are generated with random data using Faker in the seeder, so their details will be different each time the seeders are run. Ultimatelty, candidates and users are the same model.

### Exams
An exam has a title, description, start and end date/time, minimum passing score (threshold for passing), and status (active/inactive). Exams can be created, viewed, edited, and deleted by admin users. I've set the inactive state of an exam to set to "inactive" if the exam date is in the past. The exam inactive state also prevents new bookings from being created for that exam.

#### Exam Dates
In the seeder I've set exam start/end dates to be within a realistic timeframe (end being an hour ahead of start), although there is a consideration that exams could span over multiple days, either way the date handling is flexible enough to accommodate this.

### Bookings
I've set bookings to be associated with both an exam and a user (candidate). Bookings can be created for active exams only. Bookings can be viewed, edited, and deleted by admin users. When creating a booking, the admin can select from a list of existing users (candidates). 

### Results
Results are associated with bookings. A result has a score and a status (passed/failed). Results can be created and updated by admin users. The status of a result is determined based on the score and the minimum passing score of the associated exam. 

#### Result Status Logic
If the score is greater than or equal to the minimum passing score, the status is set to "passed", otherwise it is set to "failed". As per the requirements, a result can only be updated if the candidate has failed the exam (or there isn't a result available (create)).