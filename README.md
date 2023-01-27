# whatsappSender
package to send WhatsApp text messages

## Before Installation
  1. [Register](https://developers.facebook.com/docs/development/register) in meta developers
  2. Follow the instructions to 
      1. create app
      2. connect to whatsapp
      3. add phone number for testing

## Installation
1. Install the package via Composer:
  ```
  composer require elngar/whatsapp
  ```
2. Change configrations in config/whatsapp.php file:
  ```
  "access_token"          =>      '',
  "phone_number_id"       =>      ''
  ```

## Usage
  * To send text message to particular number:
    ``` 
    Whatsapp::send('01*********', 'Hello msg'); 
    ```
  * To get sent message response result:
    1. When sending
      ```
        $response = Whatsapp::send('01*********', 'Hello msg'); 
      ```
    2. After sending message
      ```
        $response = Whatsapp::getSendResult();
      ```

## Documentation
  * [meta whatsapp api docs](https://developers.facebook.com/docs/whatsapp/cloud-api/get-started)
