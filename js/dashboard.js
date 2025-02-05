// This function simulates logging out
function logout() {
    alert("Logging out...");
    window.location.href = "staff_login.php"; // Redirect to login page
}

// To display the logged-in staff member's name
document.getElementById("staff-name").textContent = localStorage.getItem("staffName") || "Staff";