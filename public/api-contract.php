<?php
?>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f7f9fc;
    margin: 20px;
    color: #333;
}

h1 {
    text-align: center;
    margin-bottom: 25px;
    color: #2c3e50;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

th {
    padding: 12px;
    text-align: left;
    background: #34495e;
    color: #fff;
    font-size: 15px;
    letter-spacing: 0.5px;
}

td {
    padding: 12px;
    border-bottom: 1px solid #e5e7eb;
}

tr:hover {
    background: #f1f5f9;
    transition: 0.2s ease-in-out;
}

td:nth-child(2) {
    font-weight: bold;
    color: #2c3e50;
}

td:nth-child(1) {
    color: #16a085;
    font-weight: 600;
}

table tr:last-child td {
    border-bottom: none;
}
</style>

<h1>API Contract</h1> 

<table> 
    <tr> 
        <th>Endpoint</th> 
        <th>Method</th> 
        <th>Autentikasi</th> 
        <th>Params/Body</th> 
        <th>Respon</th> 
    </tr>

    <!-- 1. HEALTH -->
    <tr>
        <td>/api/v1/health</td> 
        <td>GET</td>
        <td>Tidak</td> 
        <td>-</td>
        <td>{ "status": "OK" }</td>
    </tr>

    <!-- 2. CONTRACT -->
    <tr>
        <td>/api/v1/contract</td> 
        <td>GET</td>
        <td>Tidak</td> 
        <td>-</td>
        <td>Informasi layanan API {...}</td>
    </tr>

    <!-- 3. LOGIN -->
    <tr>
        <td>/api/v1/auth/login</td>
        <td>POST</td>
        <td>Tidak</td>
        <td>email, password</td>
        <td>Token {...}</td>
    </tr>

    <!-- 4. USERS ADMIN -->
    <tr>
        <td>/api/v1/users/admin</td> 
        <td>GET</td>
        <td>Bearer</td>
        <td>-</td>
        <td>Daftar User Berrole Admin {...}</td>
    </tr>

    <!-- 5. USERS LIST -->
    <tr>
        <td>/api/v1/users</td> 
        <td>GET</td>
        <td>Bearer</td> 
        <td>page, per_page</td>
        <td>Meta {...} Data {...}</td>
    </tr>

    <!-- 6. SHOW USER -->
    <tr>
        <td>/api/v1/users/{id}</td>
        <td>GET</td>
        <td>Bearer</td>
        <td>-</td>
        <td>User Data {...}</td>
    </tr>

    <!-- 7. CREATE USER -->
    <tr>
        <td>/api/v1/users</td>
        <td>POST</td>
        <td>Bearer</td>
        <td>name, email, password</td>
        <td>User Data Baru {...}</td>
    </tr>

    <!-- 8. UPDATE USER -->
    <tr>
        <td>/api/v1/users/{id}</td>
        <td>PUT</td>
        <td>Bearer</td>
        <td>name, email</td>
        <td>User Data Diperbarui {...}</td>
    </tr>

    <!-- 9. DELETE USER -->
    <tr>
        <td>/api/v1/users/{id}</td>
        <td>DELETE</td>
        <td>Bearer</td>
        <td>-</td>
        <td>{ "message": "User berhasil dihapus" }</td>
    </tr>

    <!-- 10. VERSION -->
    <tr>
        <td>/api/v1/version</td> 
        <td>GET</td>
        <td>Tidak</td> 
        <td>-</td>
        <td>{ "version": "1.0.0" }</td>
    </tr>

</table>
