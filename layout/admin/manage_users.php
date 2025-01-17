<?php 
include "nav.php";

if(isset($_GET["ActivateId"])){
    $userId = $_GET["ActivateId"];
    USerController::changeState($userId,'active');
}
if(isset($_GET["DeactivateId"])){
    $userId = $_GET["DeactivateId"];
    USerController::changeState($userId,'verification');
}
if(isset($_GET["SuspendId"])){
    $userId = $_GET["SuspendId"];
    USerController::changeState($userId,'suspended');
}
?>
<style>
    .content {
        width: 1492px;
        position: absolute;
        top: 65px;
        left: 196px;
        height: 100%;
        padding: 2rem;
        font-family: system-ui, -apple-system, sans-serif;
        background: #111827;
    }

    table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    thead {
    background: #1f2937;
    color: #e5e7eb;
    }

    th {
    padding: 1rem;
    text-align: left;
    font-weight: 600;
    }

    td {
    padding: 1rem;
    background: #1e293b;
    border-bottom: 1px solid #374151;
    color: #e5e7eb;
    }

    tr:last-child td {
    border-bottom: none;
    }

    tbody tr:hover td {
    background-color: #2d3748;
    }

    button {
    padding: 0.5rem 1rem;
    margin-right: 0.5rem;
    border: none;
    border-radius: 6px;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Activate Button */
    a:nth-child(1) button {
    background: #22c55e;
    color: white;
    }

    a:nth-child(1) button:hover {
    background: #16a34a;
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
    }

    /* Deactivate Button */
    a:nth-child(2) button {
    background: #ef4444;
    color: white;
    }

    a:nth-child(2) button:hover {
    background: #dc2626;
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
    }

    /* Suspend Button */
    a:nth-child(3) button {
    background: #f97316;
    color: white;
    }

    a:nth-child(3) button:hover {
    background: #ea580c;
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
    }

    /* Optional: Add focus styles for accessibility */
    button:focus {
    outline: 2px solid #3b82f6;
    outline-offset: 2px;
    }
    a {
    text-decoration: none;
    }
    
    .header{
        color: #047857;
    }
</style>
</head>
<body>
<div class="content">
    <h1 class="header">students</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>


    <tbody>
<?php   $data = USerController::renderStudent() ; ?>

      <!-- <tr>
        <td>1</td>
        <td>John Doe</td>
        <td>Emailsdfghjklmsdfghjklm</td>
        <td>Active</td>
        <td>
          <button>Activate</button>
          <button>Deactivate</button>
          <button>Suspend</button>
        </td>
      </tr> -->


    </tbody>
  </table>
</div>