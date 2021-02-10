<?php
    require_once("libraries/classes/Item.php");

    function getItemsIdentifiers(string $items_folder = "items"): array {
        return array_diff(scandir($items_folder), [".", ".."]);
    }

    function getItems(string $items_folder = "items"): array {
        $items_identifiers = getItemsIdentifiers($items_folder);
        $items = [];

        foreach ($items_identifiers as $item_id) {
            if (!(file_exists("items/{$item_id}/details.json"))) {
                continue;
            }
            $details_json = file_get_contents("items/{$item_id}/details.json");
            $item_details = json_decode($details_json);
            $item = new Item(
                $item_id,
                $item_details->name,
                $item_details->price,
                $item_details->currency,
                $item_details->description,
                $item_details->tags
            );
            array_push($items, $item);
        }

        return $items;
    }
?>
