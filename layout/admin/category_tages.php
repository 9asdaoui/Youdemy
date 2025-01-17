<?php include "nav.php"; ?>
<style>
  body {
        background: #111827;
        font-family: system-ui, -apple-system, sans-serif;
    }
    .container {
        top: 141px;
        right: 100px;
        position: absolute;
        display: grid;
        gap: 2rem;
        width: 500px;
        margin: 0 auto;
    }
    .container2 {
        top: 141px;
        left: 315px;
        position: absolute;
        display: grid;
        gap: 2rem;
        width: 500px;
        margin: 0 auto;
    }
    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .content {
        background: #1e293b;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    .add-button {
        background: #2563eb;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s;
    }

    .add-button:hover {
        background: #1d4ed8;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 8px;
        overflow: hidden;
        margin-top: 1rem;
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

    .action-icons {
        display: flex;
        gap: 1rem;
    }

    .icon-button {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.25rem;
        border-radius: 4px;
        color: #e5e7eb;
        transition: all 0.2s;
    }

    .icon-button:hover {
        background: #4b5563;
    }

    .form-popup {
        background: #1e293b;
        border: 1px solid #374151;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        width: 90%;
        max-width: 400px;
        display: none;
    }

    .form-popup.active {
        display: block;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #e5e7eb;
    }

    .form-group input {
        width: 100%;
        padding: 0.5rem;
        border-radius: 4px;
        border: 1px solid #374151;
        background: #1f2937;
        color: #e5e7eb;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .submit-btn {
        background: #2563eb;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
    }

    .cancel-btn {
        background: #4b5563;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
    }
</style>

<div class="container">

    <div class="content">
        <div class="header-section">
            <h2>Tags</h2>
            <button class="add-button" onclick="toggleForm('tagForm')">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Add Tag
            </button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Tag Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php renderHtml::renderTagrow(); ?>
            </tbody>
        </table>
    </div>

    <div id="tagForm" class="form-popup">
        <h3>Add New Tag</h3>
        <form action="../../core/Router.php" method="POST">
        <input type="hidden" name="url" value="addCategory">

            <div class="form-group">
                <label for="tagName">Tag Name</label>
                <input type="text" id="tagName" name="tagName" required>
            </div>
            <div class="form-actions">
                <button type="button" class="cancel-btn" onclick="toggleForm('tagForm')">Cancel</button>
                <button type="submit" class="submit-btn">Add Tag</button>
            </div>
        </form>
    </div>
</div>

<div class="container2">

    <div class="content">
        <div class="header-section">
            <h2>Categories</h2>
            <button class="add-button" onclick="toggleForm('categoryForm')">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Add Category
            </button>
    </div>
        <table>
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php renderHtml::renderCategoryrow(); ?>

            </tbody>
        </table>
    </div>

    <div id="categoryForm" class="form-popup">
        <h3>Add New Category</h3>
        <form action="../../core/Router.php" method="POST">
            <input type="hidden" name="url" value="addCategory">
            <div class="form-group">
                <label for="categoryName">Category Name</label>
                <input type="text" id="categoryName" name="categoryName" required>
            </div>
            <div class="form-actions">
                <button type="button" class="cancel-btn" onclick="toggleForm('categoryForm')">Cancel</button>
                <button type="submit" class="submit-btn">Add Category</button>
            </div>
        </form>
    </div>
</div>

<script>
  function toggleForm(formId) {
    const form = document.getElementById(formId);
    form.classList.toggle('active');
  }
</script>
