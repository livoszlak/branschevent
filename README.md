# YRGOnnect '24

[![Landing page screenshot](https://i.postimg.cc/LXRBKL71/Screenshot-2024-04-25-at-14-25-28.png)](https://postimg.cc/DWjb1J7v)

## Description
This project is a Laravel-based web application designed to facilitate networking between students and companies seeking interns at <a href="https://yrgo.se">YRGO</a>s event which took place April 24th, 2024. It was a collaborative project between students from Yrgo's programmes for Web Development and Digital Design.

We chose to work with a simple tech stack: Laravel with vanilla CSS, vanilla JS and some JQuery. We deployed the project to DigitalOcean (LEMP); [here is the deployed live version](https://http://139.59.168.187/). We wanted our site to provide a simple process for companies to register for the event, with just the bare necessities required on the attending company's part, which is why *only* the fields shown in the initial view when they want to register - basic contact information and expected number of attendees - are set as required in our `create` method.

Companies can register here for an event where they will be able to interact with potential interns. The application provides features for companies to **cr**eate, **u**pdate or **d**elete their profiles, ensuring up-to-date information is available for students. Visitors to the site can view the list of participating companies, providing a transparent and efficient platform for internship opportunities. Visitors can also utilize the site's search function to search for either company names or for tags that the companies have selected on their profile.

## Collaborators
### Programming
[Liv Oschlag](https://github.com/livoszlak) & [Lucas Ackerberg](https://github.com/lucasackerberg)
### Design
[Juni Andersen](https://www.linkedin.com/in/juni-andersen-b24651288/), [Malin Frisk](https://www.linkedin.com/in/malin-frisk-07021529a/) & [Petronella Tholander](https://www.linkedin.com/in/petronella-tholander-245161150/)

## Dependencies
This project uses the following dependencies:

### Main Dependencies
- PHP: ^8.2
- Laravel Framework: ^11.0
- Laravel Tinker: ^2.9

### Development Dependencies
- FakerPHP/Faker: ^1.23
- Laravel Pint: ^1.13
- Laravel Sail: ^1.26
- Mockery/Mockery: ^1.6
- NunoMaduro/Collision: ^8.0
- PHPUnit/PHPUnit: ^10.5
- Spatie/Laravel-Ignition: ^2.4

## Models
- **User:** This model represents a user in our application, and extends the Authenticatable class provided by Laravel. The User model has the following fields: name, contact_name, participant_count, email, and password. It also has a one-to-one relationship with the Profile model.

- **Profile:** This model, as the name suggests, represents a User's profile which is editable once a User is logged in and authorized. Creating a User (via the /registration route) simultaneously creates an associated Profile (with the same ID). The Profile in turn simultaneously gets its associated ThisOrThat and Tag instances, to which it has a one-to-many relationship. Profile has the following fields: user_id, about, has_LIA, contact_email, contact_LinkedIn, contact_url, and profile_image.

- **ThisOrThat:** Represents a question that the User can answer with one of two options. Its fields are profile_id, question, option_one, option_two, and chosen_option. chosen_option is null by default, and when the User answers the questions on their editable Profile the chosen_option is updated in the database with the help of JavaScript, and then displayed with a different color in the frontend.
  
- **Tag:** Each Profile has the same tags available to them, but each Tag also has a is_picked boolean. The User can select up to 10 tags which are then displayed on their !editable Profile. The tag selection is handled with JQuery and JS.

## Installation
To install this project, clone this repository and run `composer install` to install all the dependencies.
