# 🏥 Hospital Emergency System - ER

This project represents the **Entity Relationship Diagram (ER)** of a Hospital Emergency System. It includes entities such as Patients, Emergency Records, Ambulances, Receptionists, Contacts, and Educational data.

## 📌 Diagram (ER)

```mermaid
erDiagram

    PATIENT ||--o{ EMERGENCY : "has"
    EMERGENCY ||--o{ AMBULANCE : "uses"
    PATIENT ||--o{ PATIENT_COMPANION : "has"
    PATIENT_COMPANION }o--|| CONTACT : "has"
    EMERGENCY ||--o{ EDUCATION : "has"
    EMERGENCY ||--o{ RECEPTION : "includes"
    RECEPTION ||--|| RECEPTIONIST : "by"
    RECEPTION ||--o{ CONTACT_LOG : "includes"
    CONTACT_LOG }o--|| CONTACT : "relates to"

    PATIENT {
        int patient_id PK
        string name
        string surname
        string father_name
        string national_code
        string gender
        string address
    }

    PATIENT_COMPANION {
        int companion_id PK
        string name
        string surname
        string relation
        string phone
        int patient_id FK
    }

    CONTACT {
        int contact_id PK
        string name
        string surname
        string position
        string address
        string number
    }

    EDUCATION {
        int education_code PK
        string type
        string title
        string degree
    }

    EMERGENCY {
        int emergency_id PK
        int patient_id FK
        int education_code FK
    }

    RECEPTION {
        int reception_id PK
        int patient_id FK
        int education_code FK
        int receptionist_id FK
    }

    RECEPTIONIST {
        int receptionist_id PK
        string username
        string password
        string name
        string surname
        string phone
    }

    CONTACT_LOG {
        int contact_log_id PK
        int receptionist_id FK
        int contact_id FK
        string date
        string description
    }

    AMBULANCE {
        int ambulance_id PK
        string plate
        string brand
        string type
        string driver_name
        int emergency_id FK
    }
