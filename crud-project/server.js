const express = require('express');
const mysql = require('mysql2');
const cors = require('cors');
const bodyParser = require('body-parser');
const app = express();

app.use(cors());
app.use(bodyParser.json());
app.use(express.static(__dirname));

// MySQL Connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'crud_db'
});

// Connect Database
db.connect((err) => {
    if (err) {
        console.log('Database connection failed');
        console.log(err);
    } else {
        console.log('MySQL Connected');
    }
});

// CREATE
app.post('/addStudent', (req, res) => {
    console.log(req.body);

    const { name, email, course } = req.body;

    const sql = 'INSERT INTO students (name, email, course) VALUES (?, ?, ?)';

    db.query(sql, [name, email, course], (err, result) => {

        if (err) {
            console.log(err);
            res.send(err);
        } else {
            console.log("Inserted Successfully");
            res.send("Student Added");
        }
    });
});

// READ
app.get('/students', (req, res) => {
    const sql = 'SELECT * FROM students';

    db.query(sql, (err, result) => {
        if (err) {
            res.send(err);
        } else {
            res.json(result);
        }
    });
});

// UPDATE
app.put('/updateStudent/:id', (req, res) => {
    const id = req.params.id;
    const { name, email, course } = req.body;

    const sql = 'UPDATE students SET name=?, email=?, course=? WHERE id=?';

    db.query(sql, [name, email, course, id], (err, result) => {
        if (err) {
            res.send(err);
        } else {
            res.send('Student Updated');
        }
    });
});

// DELETE
app.delete('/deleteStudent/:id', (req, res) => {
    const id = req.params.id;

    const sql = 'DELETE FROM students WHERE id=?';

    db.query(sql, [id], (err, result) => {
        if (err) {
            res.send(err);
        }        
});
});

// Start Server
app.listen(3000, () => {
    console.log('Server running on http://localhost:3000');
})
