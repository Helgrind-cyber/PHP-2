# STUDYING PHP - 2
## Nguyen Hong Quan
## PT15111-WEB
##1. Request
- GET REQUEST: tham số đường dẫn(query string): ?key=value
- $_GET lay du lieu tu url, k lien quan toi REQUEST
- $_POST: gui form data, bao mat
##2. OOP (Object-oriented programming)
- Lập trình hướng đối tượng là gì?
- class
- Thuộc tính (properties)
- Phuong thuc (function)
- `new` key word
- instance
- Kế thừa: kế thừa đa cấp
- PHP là ngôn ngữ đơn kế thừa
- Tính đa hình: lớp con được phép định nghĩa lại hành động, giá trị, thuộc tính của lớp cha. "overwrite"
- Tính đóng gói: bảo vệ, giới hạn quyền truy cập thuộc tính, phương thức của 1 class "public" "protected" "private"
##3. MVC.
- "Naming Convention"
- Name space
- Chuan dat ten: PSR4
- Cai composer
- Model, Controller, View
- Life cycle
##4. Name space.
- Bắt đầu từ khi khai baos tới khi gặp 1 namespace khác, hoặc đến khi kết thúc
##5. Composer.
- "composer init"
- "composer dumpautoload": command line
- "composer install": install vendor autoload packages
- "composer update": cap nhat thu vien moi nhat
- copy autoload json
    + Thu vien: tuong tac db: illuminate/database
    + xu ly tang view: jensseger/blade
    + xu ly tang routing: phroute/phroute, nikic/fast-route
##6. Eloquent ORM
- Retrieving Models:
    + ::all()
    + ::where('ten cot', gtri) select * from table where 'ten cot' = gtri
    + ('ten cot', 'phep dkien', gtri) select * from table where 'ten cot' 'phep dkien' gtri (select * from table where idlike 'a')
    + get() tra ve mang chua object
    + first() tra ve object
    + orderBy('gtri1', 'gtri2')
    + ::find(value) tim gia tri theo khoa chinh
    + ->delete(): xoa dua theo 1 dieu kien bat ky
    + ::destroy(): xoa 1 hay nhieu theo id
    + ::create(valueArr)
    + ->save()
-   2 cot phai co gtri: created_at, updated_at -> public $timestamp = false
