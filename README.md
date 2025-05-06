erDiagram
    EmergencyPatient ||--o{ EmergencyVisit : has
    Doctor ||--o{ EmergencyVisit : oversees
    Nurse ||--o{ EmergencyVisit : assists

    EmergencyPatient ||--o{ EmergencyPrescription : "receives"
    Doctor ||--o{ EmergencyPrescription : "writes"

    EmergencyPrescription ||--o{ PrescriptionDetail : contains
    Medication ||--o{ PrescriptionDetail : included_in

    EmergencyPatient ||--|| DischargeStatus : "has"

    EmergencyPatient {
        int patient_id PK
        string first_name
        string last_name
        int age
        string gender
        string emergency_status
        datetime arrival_time
    }

    Doctor {
        int doctor_id PK
        string name
        string specialty
        string shift
    }

    Nurse {
        int nurse_id PK
        string name
        string shift
        string phone
    }

    EmergencyVisit {
        int visit_id PK
        datetime visit_time
        string initial_condition
        int patient_id FK
        int doctor_id FK
        int nurse_id FK
    }

    Medication {
        int medication_id PK
        string name
        string dosage
        string administration
    }

    EmergencyPrescription {
        int prescription_id PK
        date date_issued
        int patient_id FK
        int doctor_id FK
    }

    PrescriptionDetail {
        int prescription_id FK
        int medication_id FK
        string dosage
        string frequency
    }

    DischargeStatus {
        int status_id PK
        string status_type
        date record_date
        int patient_id FK
    }

