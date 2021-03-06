# Исключения
Семинар по применению исключений в языках программирования

Дата проведения семинара 14 сентября 2015

## Практика применения

Исключения — это гибкий, расширяемый метод обработки ошибок;

Это стандартизованный механизм – человеку, не работавшему с вашим кодом, не нужно будет читать мануал, чтобы понять, как обрабатывать ошибки. Ему достаточно знать, как работают исключения;

С исключениями гораздо проще находить источник ошибок, так как всегда есть стек вызовов (trace).

#### 1. Избегаем выброса абстрактных исключений
Объявите хотя бы один класс исключений специально для вашего приложения (модуля, библиотеки).
И выбрасывайте его.

#### 2. Используем базовые классы исключений для модулей, библиотек или слоя приложения
```php
class InvalidArgumentException extends \InvalidArgumentException {

}
```

#### 3. Если в данном контексте не понятно исключение — пробрасываем его дальше

Не разрывать цепь исключений. Третьим параметром передается изначальное исключение. Этот код нативно работает в 5.3 и с доработкой в 5.2. При таком подходе стек вызовов будет «цельным» от самого первого броска исключения.
```php
try{
    //...
}catch(Exception $e){
    throw new Exception($message, 0, $e); //не разрывайте цепь
}
```

#### 4. Необходим общий обработчик исключений
Это может быть или try...catch на самом верхнем уровне или ExceptionHandler.

Все исключения, которые добрались до глобального обработчика, считаются критическими, так как не были правильно обработаны ранее.

Их надо залогировать.

#### 5. Всегда обрабатываете исключения (никогда не глушите исключения без какой либо обработки)
```php
// Плохой пример, бедем искать очень долго это место
try {
    //...
} catch (Exception $e) {
    //ничего делаем
}
```

#### 6. Используем без фанатизма (иногда лучше продуманный интерфейс взаимодействия, чем более одного класса выбрасываемого исключения)
Задумывайтесть об публичных интерфейсах взаимодействия. Исключения лучше оставить для внештатного поведение алгоритма

#### 7. Документируйте исключения
Используем phpDoc
```php
/**
* @throws InvalidArgumentException
*/
public function validate($inn) {
  if (!$inn) {
    throw new InvalidArgumentException('Параметр ИНН является обязательным');
  }
  //Code
}
```

## Практическое задание
Реализовать патерн наблюдатель, с использованием выброса/обработки исключений

- https://github.com/sabirovruslan/example-seminar/blob/master/day_6/index.php

### Используемые источники
- http://php.net/manual/ru/language.exceptions.php
- http://habrahabr.ru/post/100137/
- https://gist.github.com/codedokode/65d43ca5ac95c762bc1a


