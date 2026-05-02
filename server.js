const express = require('express');
const mysql = require('mysql2');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(bodyParser.json());

// 1. Database Connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root', // Default XAMPP/WAMP user
    password: '', 
    database: 'gram_panchayat_db'
});

db.connect((err) => {
    if (err) throw err;
    console.log('Connected to MySQL Database.');
});

// 2. Create Table (Run once or manually in PHPMyAdmin)
/*
CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_type VARCHAR(100),
    applicant_name VARCHAR(255),
    mobile VARCHAR(15),
    address TEXT,
    status VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
*/

// 3. API Route to handle Application Submission
app.post('/api/apply', (req, res) => {
    const { service_type, applicant_name, mobile, address } = req.body;
    
    const sql = "INSERT INTO applications (service_type, applicant_name, mobile, address) VALUES (?, ?, ?, ?)";
    db.query(sql, [service_type, applicant_name, mobile, address], (err, result) => {
        if (err) {
            return res.status(500).json({ error: err.message });
        }
        res.status(200).json({ 
            message: 'Application Received', 
            applicationId: result.insertId 
        });
    });
});

// 4. API Route for Admin to see all applications
app.get('/api/applications', (req, res) => {
    db.query("SELECT * FROM applications ORDER BY created_at DESC", (err, results) => {
        if (err) throw err;
        res.json(results);
    });
});

app.listen(3000, () => {
    console.log('Server running on http://localhost:3000');
});