<?php
include_once "nav.php";
?>
<style>
    .card {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        color: white;
        text-align: center;
        width: 288px;
        position: absolute;
        height: 160px;
        top: 122px;
        padding: 23px;
        left: 21%;
    }

    .card h2 {
        font-size: 3rem;
        margin: 0;
        font-weight: bold;
    }

    .card p {
        font-size: 1.2rem;
        margin: 10px 0 0;
    }
</style>
<div class="card">
        <h2 id="totalSubscriptions">     <?php echo Teacher::getTotalSubscriptionsForTeacher($user_id); ?></h2>
        <p>Total Subscriptions</p>
</div>

