## 🏥 Hospital Emergency Department ER Chart
```mermaid
erDiagram
    EmergencyPatient {
        INT patient_id PK
        STRING name
        STRING surname
        INT age
        STRING gender
        STRING emergency_status
        DATETIME arrival_time
    }

    Doctor {
        INT doctor_id PK
        STRING name
        STRING specialty
        STRING shift
    }

    Nurse {
        INT nurse_id PK
        STRING name
        STRING shift
        STRING phone
    }

    EmergencyVisit {
        INT visit_id PK
        DATETIME visit_time
        STRING initial_condition
        INT patient_id FK
        INT doctor_id FK
        INT nurse_id FK
    }

    Medication {
        INT medication_id PK
        STRING name
        STRING dosage
        STRING usage
    }

    EmergencyPrescription {
        INT prescription_id PK
        DATE date
        INT patient_id FK
        INT doctor_id FK
    }

    PrescriptionDetail {
        INT prescription_id FK
        INT medication_id FK
        STRING dose
        STRING frequency
    }

    DischargeStatus {
        INT status_id PK
        STRING status_type
        DATE date
        INT patient_id FK
    }

    EmergencyPatient ||--o{ EmergencyVisit : "has"
    EmergencyVisit }o--|| Doctor : "by"
    EmergencyVisit }o--|| Nurse : "assisted by"
    Doctor ||--o{ EmergencyPrescription : "writes"
    EmergencyPatient ||--o{ EmergencyPrescription : "receives"
    EmergencyPrescription ||--o{ PrescriptionDetail : "contains"
    Medication ||--o{ PrescriptionDetail : "used in"
    EmergencyPatient ||--|| DischargeStatus : "has"
