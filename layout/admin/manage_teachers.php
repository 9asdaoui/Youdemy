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
?>
<style>
    body {
        background: #111827;
        font-family: system-ui, -apple-system, sans-serif;
    }

    .content {
        position: absolute;
        top: 113px;
        left: 224px;
        background: #1e293b;
        border-radius: 12px;
        padding: 2rem;
        box-shadow:  0 4px 6px rgba(0, 0, 0, 0.3);
    }
    .contentTWO {
        position: absolute;
        top: 113px;
        right: 27px;
        background: #1e293b;
        border-radius: 12px;
        padding: 2rem;
        box-shadow:  0 4px 6px rgba(0, 0, 0, 0.3);
    }
    .header {
        font-size: 1.5rem;
        color: #e5e7eb;
        margin-bottom: 1.5rem;
        font-weight: 600;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 1rem;
        border-radius: 8px;
        overflow: hidden;
    }

    th {
        background: #1f2937;
        color: #e5e7eb;
        font-weight: 600;
        text-align: left;
        padding: 1rem;
        border-bottom: 2px solid #374151;
    }

    td {
        padding: 1rem;
        border-bottom: 1px solid #374151;
        color: #e5e7eb;
    }

    tbody tr:hover {
        background-color: #2d3748;
    }

    .content table {
        border: 1px solid #7f1d1d;
    }

    .content .header {
        color: #ef4444;
    }

    .contentTWO table {
        border: 1px solid #14532d;
    }

    .contentTWO .header {
        color: #22c55e;
    }

    button {
        padding: 0.5rem 1rem;
        margin-right: 0.5rem;
        border: none;
        border-radius: 6px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        color: white;
    }

    .content button {
        background: #dc2626;
    }

    .content button:hover {
        background: #b91c1c;
    }

    .contentTWO button {
        background: #059669;
    }

    .contentTWO button:hover {
        background: #047857;
    }

    @media (max-width: 768px) {
        body {
            padding: 1rem;
        }
        
        .content, .contentTWO {
            padding: 1rem;
        }
        
        th, td {
            padding: 0.75rem;
        }
    }
</style>
</head>
<body>
<div class="content">
    <h1 class="header">Non verified Teachers</h1>
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
        <?php   $data = USerController::renderNonVrTeacher() ; ?>

            <!-- <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Pending</td>
                <td>
                    <button>Activate</button>
                    <button>Suspend</button>
                </td>
            </tr> -->
        </tbody>
    </table>
</div>

<div class="contentTWO">
    <h1 class="header">Verified Teachers</h1>
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
        <?php   $data = USerController::renderVrTeacher() ; ?>

            <!-- <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>jane@example.com</td>
                <td>Active</td>
                <td>
                    <button>Deactivate</button>
                    <button>Suspend</button>
                </td>
            </tr> -->
        </tbody>
    </table>
</div>