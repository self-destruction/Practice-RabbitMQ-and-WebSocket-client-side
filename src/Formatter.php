<?php

namespace App;

/**
 * Class Formatter
 * Класс для форматирования данных
 */
class Formatter
{
    /**
     * Метод, выполняющий сериализацию, сжатие и кодироваие
     * входного массива для передачи по каналу
     * @param array $arrayData
     * @return string
     */
    public static function convertData(array $arrayData): string {
        $serializedData = serialize($arrayData);

        $dataLength = strlen($serializedData);
        $compressedData = gzencode($serializedData);

        $serializedData = serialize(['data' => $compressedData, 'length' => $dataLength]);

        return base64_encode($serializedData);
    }
}