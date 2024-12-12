# cloud-computing

## Diagram Architecture
![GCP horizontal framework](https://github.com/user-attachments/assets/0d5edd9d-5792-4bad-96c5-9e7a327e3ce5)

## Entity Relationship Diagram
![Database ER diagram](https://github.com/user-attachments/assets/24c3fcee-37ec-43b6-a3e1-1b1435a4b13b)

## Tech Architecture
- PHP
- Laravel
- Compute Engine
- Cloud SQL
- Cloud Storage

## Endpoint Routes
|      ENDPOINTS      | METHOD |          ACTION          |     AUTH     |   
|---------------------|:------:|:------------------------:|:------------:|
| /api/login          | POST   | user login               | Not required |   
| /api/register       | POST   | user register            | Not required |   
| /api/logout         | POST   | user logout              | Required     |   
| /api/waste-types    | GET    | get type of waste        | Required     |   
| /api/materials      | GET    | get material description | Required     |   
| /api/quests         | GET    | get quests for user      | Required     |   
| /api/quizzes        | GET    | get quizzes              | Required     |   
| /api/quizzes/submit | POST   | submit quizzes           | Required     |   
| /api/leaderboard    | GET    | get leaderboard          | Required     |
