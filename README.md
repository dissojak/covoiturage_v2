# 🚗 Covoiturage App

ps: this is a school project !

A PHP-based carpooling platform that connects drivers with passengers to share rides, reduce costs, and make travel more eco-friendly.

## 🛠️ Services

- Ride Sharing System
- Driver & Passenger Management
- Admin Dashboard & Moderation Tools

## 📌 Features

- 🧍‍♂️ User Registration & Authentication (Login/Signup)
- 📍 Trip Creation by Drivers (origin, destination, date, time, available seats)
- 🔍 Trip Search for Passengers
- ✉️ Booking Requests & Confirmations
- 📝 Trip Details & Booking Status Dashboard
- 📊 Admin Panel (manage users and rides)
- 🔐 Secure session-based login system

## 🧑‍💻 Tech Stack

- **Backend:** PHP (Vanilla / MVC architecture)
- **Frontend:** HTML5, CSS3, Bootstrap, JavaScript
- **Database:** MySQL
- **Server:** Apache (XAMPP, WAMP, or LAMP stack)

## 🗂️ Project Structure

```
/covoiturage-app
│
├── /config           # Database connection & config files
├── /controllers      # Request logic & form handlers
├── /models           # Data models & queries
├── /views            # UI templates (HTML/CSS/JS)
├── /services         # Business logic and service classes
├── index.php         # Main router file
└── README.md
```

## 🚀 Getting Started

1. **Clone the repository**
```bash
git clone https://github.com/dissojak/covoiturage_v2.git
```

2. **Set up your local server**
- Use [XAMPP](https://www.apachefriends.org/) or [WAMP](https://www.wampserver.com/)
- Place the project inside `htdocs` (XAMPP) or `www` (WAMP)

3. **Create the database**
- Import the SQL file from `/database/covoiturage.sql` using phpMyAdmin

4. **Update DB credentials**
- Go to `/config/database.php` and update:
```php
$host = 'localhost';
$dbname = 'covoiturage';
$username = 'root';
$password = '';
```

5. **Run the app**
- Open your browser and go to:  
`http://localhost/covoiturage-app/public/index.php`

## 📷 Screenshots

> *(Add some screenshots of the homepage, trip list, booking page, etc.)*

## 📦 Future Improvements

- Add user profile system  
- Integrate Google Maps API for location picking  
- Implement messaging between driver and passenger  
- Add mobile-responsive design  

## 🧑‍🎓 Author

**DissoJak**  
🎥 Freelancer | 🧑‍💻 Dev | 🎨 Designer  
[LinkedIn](https://www.linkedin.com/NoOneYet) • [Instagram](https://www.instagram.com/adem_ben_amor) • 
[WebSite](stoonproduction.com)
## 📄 License

This project is licensed under the MIT License — see the [LICENSE](LICENSE) file for details.
