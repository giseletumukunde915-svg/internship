const api = 'http://localhost:3000';
async function loadStudents() {

    const response = await fetch(`${api}/students`);
    const data = await response.json();

    let rows = '';

    data.forEach(student => {

        rows += `
            <tr>
                <td>${student.id}</td>
                <td>${student.name}</td>
                <td>${student.email}</td>
                <td>${student.course}</td>
                <td>
                    <button onclick="editStudent(${student.id}, '${student.name}', '${student.email}', '${student.course}')">
                        Edit
                    </button>

                    <button onclick="deleteStudent(${student.id})">
                        Delete
                    </button>
                </td>
            </tr>
        `;

    });

    document.getElementById('studentTable').innerHTML = rows;
}

async function addStudent() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const course = document.getElementById('course').value;

    await fetch(`${api}/addStudent`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ name, email, course })
    });

    clearForm();
    loadStudents();
}

// Edit Student
function editStudent(id, name, email, course) {
    document.getElementById('studentId').value = id;
    document.getElementById('name').value = name;
    document.getElementById('email').value = email;
    document.getElementById('course').value = course;
}

// Update Student
async function updateStudent() {
    const id = document.getElementById('studentId').value;
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const course = document.getElementById('course').value;

    await fetch(`${api}/updateStudent/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ name, email, course })
    });

    clearForm();
    loadStudents();
}

// Delete Student
async function deleteStudent(id) {
    await fetch(`${api}/deleteStudent/${id}`, {
        method: 'DELETE'
    });

    loadStudents();
}

// Clear Form
function clearForm() {
    document.getElementById('studentId').value = '';
    document.getElementById('name').value = '';
    document.getElementById('email').value = '';
    document.getElementById('course').value = '';
}

// Load when page opens
loadStudents();