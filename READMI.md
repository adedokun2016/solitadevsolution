

<p align="center">
  <img src="banner.png">
</p>


# Solita Dev Academy 2022 - farm data exercise

- [✍️ This project is made as a part of the application for Solita dev academy 2022.Link to the Exercise ](https://github.com/solita/dev-academy-2022-exercise)

My implementation of [Solita Dev Academy exercise](https://github.com/solita/dev-academy-2022-exercise). Project is made with PHP and contains both API and Web UI implementations.



### 3. Image of frontend implementation/Features showcase
### 2. Installation
### Used technologies:
React
Bootstrap


## How to use:

### Prerequisites: reviewer install something on their computer before they can compile and run the project
Install [XAMPP localhost server](https://www.apachefriends.org/download.html)

### Configurations: Do you have to configure for example database connections locally

### How to run the project

### Tests: If your project has tests, include instructions on how to run them

### Description of the project: What is the purpose of the project and what features it has?

### Technology choices: List chosen technologies. It’s also nice to know why you chose those technologies.





## To Do and Progress

### Backend

| Backend | Progress |
|--|--|
| CSV parsing and validation| ✅ |
| Endpoints to fetch data from farms with different granularities (by month, by metric) | ❎ |
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
| Endpoints to store new farms and new data| 🚧 |
| Add User management | ✅ |
| Running backend in Docker | ❎ |
| Running backend in Cloud| ❎ |
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


- Recreate using Laravel or React
- Drop jQuery dependency


- [✍️ Link to the Exercise ](https://github.com/solita/dev-academy-2022-exercise)



