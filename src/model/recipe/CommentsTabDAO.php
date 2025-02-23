<?php
namespace vrklk\model\recipe;

class CommentsTabDAO extends \vrklk\base\model\BaseDAO implements
    \vrklk\model\interfaces\iRecipeTabDAO
{
    public function getTabName() : string
    {
        return 'Opmerkingen';
    }
    
    public function getTabContent(int $recipe_id) : array
    {
        return $this->crud->selectMore(
            "SELECT c.text, u.name, u.img"
            ." FROM comments AS c"
            ." INNER JOIN users AS u ON c.user_id = u.id"
            ." WHERE c.recipe_id = :recipe_id"
            ." ORDER BY c.date DESC",
            [
                'recipe_id' => [$recipe_id, true],
            ],
        );
    }
}