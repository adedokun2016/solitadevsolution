
<p align="center">
  <img src="banner.png">
</p>


# Solita Dev Academy 2022 - farm data exercise

- ✍️ This project is made as a part of the application for Solita dev academy 2022. [Link to the Exercise ](https://github.com/solita/dev-academy-2022-exercise)

My implementation of [Solita Dev Academy exercise](https://github.com/solita/dev-academy-2022-exercise). Project is made with PHP and contains both Backend and Web UI implementations.


## How to run the project

### Prerequisites: 
Install [XAMPP localhost server](https://www.apachefriends.org/download.html)


### Installation/Configurations:
- Download zip file and Unzip file on your local server.
- Put this file inside "c:/xampp/htdocs/" .
- Database Configuration Open phpmyadmin
- Create Database named "adedokun2016"
- Import database adedokun2016.sql from downloaded folder(inside database)
- Open Your browser put inside "http://localhost/Project Folder Name/"


### Tests: If your project has tests, include instructions on how to run them

### Description of the project: What is the purpose of the project and what features it has?

This PHP project is to create a UI and a backend for displaying data from different farms.

Farm Data are from 4 different research firm namely
- Noora's farm
- Friman Metsola collective
- Organic Ossi's Impact That Lasts plantation
- PartialTech Research Farm

Features includes

- Login / Logout
- Registration of users
- Password change
- Add New data
- Delete Farm data
- View Farm data Details-Climate information and Location 
- Edit Farm Data
- Export Farm Data in Excel file



### Used technologies:
I used PHP because its ability to interact with database systems
- Frontend: HTML, CSS, JavaScript,Bootstrap
- Back end: PHP, MySQL Database

### Image of frontend implementation/Features showcase






## To Do and Progress

### Backend

| Backend | Progress |
|--|--|
| CSV parsing and validation| ✅ |
| Endpoints to fetch data from farms with different granularities (by month, by metric) | ✅ |
| Aggregate calculation endpoints, endpoint which returns monthly averages, min/max and other statistical analysis | ❎ |
| Add tests| ❎ |
| Input and output validation | ✅ |


### Frontend
|Frontend | Progress |
|--|--|
| Show data in table format| ✅ |
| Add filtering options | ✅ |
| Aggregate calculation endpoints, endpoint which returns monthly averages, min/max and other statistical analysis | ❎ |
| Add tests (fex. React testing library)| ❎ |
| Show data in graphs | 😎 |



### Nice to have

| Nice to Have | Progress |
|--|--|
| Endpoints to store new farms and new data| ✅ |
| Add User management | ✅ |
| Running backend in Docker | 😎 |
| Running backend in Cloud| 😎 |
| Add a map which shows the location of the farms and which can be interacted with| ✅ |
| Add E2E tests| ❎ |
| Add UI for adding data to farms and creating new farms| ✅ |
| Add User login for data manipulation| ✅ |


### Validation rules

- Accept only temperature, rainfall and pH data. Other metrics should be discarded.
- Discard invalid values with next rules:
  - pH is a decimal value between 0 - 14
  - Temperature is a Celsius value between -50 and 100
  - Rainfall is a positive number between 0 and 500
- Data may be missing from certain dates

## Future plans

If I have time, I would still like to do these:


- Recreate using Laravel or React Framework
- Running backend in Docker


- [✍️ Link to the Exercise ](https://github.com/solita/dev-academy-2022-exercise)
