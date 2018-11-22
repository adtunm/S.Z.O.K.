UPDATE `tranzakcje`
SET `Promocje_id` = `Promocje_id` MOD 29 + 1
WHERE `Promocje_id` IS NOT NULL