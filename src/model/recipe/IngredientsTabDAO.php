<?php
namespace vrklk\model\recipe;

class IngredientsTabDAO extends \vrklk\base\model\BaseDAO implements
    \vrklk\model\interfaces\iRecipeTabDAO
{
    public function getTabName() : string
    {
        return 'Ingrediënten';
    }
    
    public function getTabContent(int $recipe_id) : array
    {
        $ingredients = $this->crud->selectMore(
            "SELECT i.id, i.name AS ingredient, r.quantity, m.name AS measure"
            ." FROM recipe_ingredients AS r"
            ." INNER JOIN ingredients AS i ON r.ingredient_id = i.id"
            ." INNER JOIN measures AS m ON r.measure_id = m.id"
            ." WHERE r.recipe_id = :recipe_id"
            ." ORDER BY ingredient ASC",
            [
                'recipe_id' => [$recipe_id, true],
            ],
        );
        $product_dao = new \vrklk\model\recipe\ProductDAO;
        foreach($ingredients as $index => $ingredient)
        {
            $product_match = $product_dao->getIngredientProduct(
                $ingredient['id'],
                $ingredient['quantity']
            );
            if($product_match)
            {
                $product_id = array_keys($product_match['products'])[0];
                $product_info = $product_dao->getProductById($product_id);
                $img = $product_info['img'];
                $blurb = $product_info['blurb'];
            }
            else
            {
                switch ($ingredient['id']) 
                {
                    case 5:
                        $img = 'kraanwater.png';
                        $blurb = 'Koud water uit de kraan.';
                        break;
                    default:
                        $img = 'placeholder.png';
                        $blurb = 'Voor dit ingrediënt is geen product gevonden.';
                }
            }
            $ingredients[$index]['img'] = $img;
            $ingredients[$index]['blurb'] = $blurb;
        }
        return $ingredients;
    }
}