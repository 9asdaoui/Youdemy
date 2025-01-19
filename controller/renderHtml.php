<?php
require_once __DIR__."/../src/loger.php";
require_once __DIR__."/../src/Category.php";
require_once __DIR__."/../src/tages.php";

class renderHtml 
{

    public static function renderCategory()
    {
        $data = Category::getAllCategories();
        foreach ($data as $item) {
            echo '<option value="' . $item['id'] . '">' . htmlspecialchars($item['name']) . '</option>';
        }
    }
    public static function renderCategoryrow()
    {
        $data = Category::getAllCategories();
        foreach ($data as $item) {
           echo' <tr>
                    <td>' . htmlspecialchars($item['name']) . '</td>
                    <td>
                        <div class="action-icons">
                            <a href="?updateCatid=' . $item['id'] . '"><button class="icon-button">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </button></a>
                             <a href="?deletCatid=' . $item['id'] . '"><button class="icon-button">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button> </a>
                        </div>
                    </td>
                </tr>';
        }
    }
    public static function renderTagrow()
    {
        $data = tag::getAlltags();
        foreach ($data as $item) {
           echo' <tr>
                    <td>' . htmlspecialchars($item['name']) . '</td>
                    <td>
                       <a href="?updateTagid=' . $item['id'] . '"> <div class="action-icons">
                            <button class="icon-button">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </button></a>
                            <a href="?deletTagid=' . $item['id'] . '"><button class="icon-button">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button></a>
                        </div>
                    </td>
                </tr>';
        
        }
    }
    
}