# Todo
- Add filtering options for bookings (by user, date, status)
- Remove auto-admin registration
- Make tables into components, it's a bit of a nightmare having them all over the place
- Add notifications on CRUD actions (other than failures)
- Write unit tests for Booking model
- Change user names to first and last names in DB and views (add fullName() method to User model)


# Completed
- Implement pagination for exam results
- Change exam dates to start and end (+1 hour) as current dates are weeks/months apart which is not realistic
- Refactored booking result display logic in exam view
- Updated Booking model to include hasResult method
- Changed booking view link to route to booking view page instead of edit page