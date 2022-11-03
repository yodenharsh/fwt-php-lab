# Harsh's Book a Trip Website

The object of this project (?) is to make a website with a fully functional front-end, back-end and database which offers a smooth experience to the user to let them signup, signin, choose book trips and view their booked trips.

It makes heavy use of bootstrap, jQuery, PHP and MySQL.

- [js](#js)
- [layout](#layout)
- [styles](#styles)
- [Root folder](#root-folder)

## Folder structure

### `js`

Contains `login.js`
where the logic for client-side validation is defined.
Uses various jQuery for event listening. It utilizes RegEx to validate email on every 'blur' of the email input field.

If email is not valid, changes the background color of the input box and un-hides an error message.
<br/><br/></br>
Also contains `new_trips.js` .This file stores the logic that is used during execution of the new booking page. It doesn't let the user submit their booking form if the required information is invalid/missing. Also displays an error box if information is invalid/missing.
<br/><br><br/></br></br>

### `layout`

Contains `header.php` which is also the most used layout elemnent in the webpage that aims to bring a consistent experience. The header contains the basic design for the navigation buttons and main header. It is `required()` on almost all the pages.
<br/><br/><br/>
Also contains `new_trip_form.php` which houses the form used during new trip booking. The form heavily depends on bootstrap classes for it's look. The key classes that were used are `form`,`card`,`row`, `form-check` and `container` and it's variants.
<br/><br><br/>
Also contains `table.php` which the table template used during the _view trips_ page. Used bootstrap table libraries and generates new table rows based on the `SELECT` query passed.
<br/><br><br/>
Also contains `upload_png.php` which contains the layout and input options to let the user upload their image.
<br/><br><br/></br></br>

### `styles`

Contains `index.css` which is contains the custom styles used in the index page, signup page and the header.
<br/><br><br/>
Contains `new_trips.css` which contains a single class `.error-box` used by the error dialog in the booking page.
<br/><br><br/></br></br>

### `uploads`

All the file uploads are physically stored here.

<br/><br><br/><br/><br/>

### Root folder

- `add_trip.php`

Contains logic to insert the passed trip details into the database table `trip_details`. Gets email from `$_COOKIE` and every other info from `$_GET`. If user is not logged in, force redirects to `index.php` .

- `index.php`

Landing page. Is also a login page. Uses `styles/index.css` and `js/login.js`.
Takes user email and password as input. Also presents a link for users to signup.

- `logout.php`

Unsets the email cookie essentially, logging out the user

- `new_trips.php`

Firstly checks if user is logged in and if not, redirects to login page. Else, loads `layout/new_trip_form.php`,`styles/new_trips.css` and `js/new_trips.js` and if everything is correct, goes to `add_trip.php` passing information as `$_GET`.

- `process_login.php`

Gets info as `$_POST` from `index.php`. Connecs to database and if the email-password combination exists in `user_details`, then sets the email cookie. Else, displays an error.

- `process_signup.php`

Gets info as `$_POST` from `signup.php`. Connects to database and if the email-password combination exists in `user_details`, displays error or else, adds the combination to the database with password encrypted in **MD5**.
Also gets a file which is stored in the `uploads` folder as the email of the user.

- `signup.php`

Loads `styles/index.css` and `upload_png.php`. Lets the user enter their email, password and their identity proof as a .png and on submit, navigates to `process_signup.php`

-`view-trips.php`

Loads `layout/table.php`. `SELECT`s based on user email which is retrieved from `$_COOKIE`. The rows are generated based on the entries in `trip_details` table.
