let records = JSON.parse(localStorage.getItem('records')) || [];

// Function to render table
function renderTable() {
    const tableBody = document.getElementById('tableBody');
    tableBody.innerHTML = '';
    records.forEach((record, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${record.name}</td>
            <td>${record.age}</td>
            <td class="actions">
                <button class="edit-btn" onclick="editRecord(${index})">Edit</button>
                <button class="delete-btn" onclick="deleteRecord(${index})">Delete</button>
            </td>
        `;
        tableBody.appendChild(row);
    });
}

// Function to add a new record
function addRecord() {
    const name = document.getElementById('name').value;
    const age = document.getElementById('age').value;

    if (name && age) {
        records.push({ name, age });
        localStorage.setItem('records', JSON.stringify(records));
        renderTable();
        clearForm();
    } else {
        alert("Please fill out both fields");
    }
}

// Function to edit a record
function editRecord(index) {
    const name = prompt("Edit Name", records[index].name);
    const age = prompt("Edit Age", records[index].age);

    if (name && age) {
        records[index] = { name, age };
        localStorage.setItem('records', JSON.stringify(records));
        renderTable();
    }
}

// Function to delete a record
function deleteRecord(index) {
    if (confirm("Are you sure you want to delete this record?")) {
        records.splice(index, 1);
        localStorage.setItem('records', JSON.stringify(records));
        renderTable();
    }
}

// Function to clear the form
function clearForm() {
    document.getElementById('name').value = '';
    document.getElementById('age').value = '';
}

// Initial table render
renderTable();
