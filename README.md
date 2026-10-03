# laravel-task-api
# Laravel RESTful Task Management API & SPA
Modern bir backend mimarisi ve hafif (lightweight) asenkron istemci katmanı kullanılarak geliştirilmiş **Görev Yönetim Sistemi**. Bu proje, Laravel 12 çerçevesi üzerinde REST tabanlı uç noktalar (endpoints) sunar ve istemci tarafında Vanilla JavaScript (Fetch API) ile durum yönetimini gerçekleştirir.

---
## Teknolojiler ve Mimari
- **Backend:** PHP 8.2+, Laravel 12
- **Veritabanı:** SQLite / MySQL (Eloquent ORM)
- **Frontend:** HTML5, Tailwind CSS, Vanilla JavaScript (Fetch API)
- **Mimari Kalıp:** Model-View-Controller (MVC), RESTful Architecture

---
## Özellikler
- **RESTful Endpoints:** Standart HTTP metotları (`GET`, `POST`, `PUT`, `DELETE`) ile tam CRUD desteği.
- **Güvenlik & Mass Assignment Protection:** Eloquent modellerinde `$fillable` özniteliği ile katı veri aktarımı kontrolü.
- **Girdi Doğrulama (Server-Side Validation):** `Request::validate` ile API seviyesinde veri tutarlılığı denetimi.
- **Dinamik SPA Deneyimi:** Sayfa yenilenmesi gerekmeksizin veri listeleme, ekleme, güncelleme ve silme işlemleri.

---
## API Uç Noktaları (Endpoints)

/ Metot / Uç Nokta (Endpoint) / Açıklama / İstek Gövdesi (Request Body) /
/ :--- / :--- / :--- / :--- /
/ `GET` / `/tasks` / Tüm görevleri listeler / N/A / 
/ `POST` / `/tasks` / Yeni bir görev oluşturur / `{"title": "string", "description": "string?"}` /
/ `GET` / `/tasks/{id}` / Belirtilen görevin detayını getirir / N/A / 
/ `PUT` / `/tasks/{id}` / Görevi veya durumunu günceller / `{"title": "string?", "is_completed": "boolean?"}` /
/ `DELETE` / `/tasks/{id}` / Belirtilen görevi siler / N/A /

---
## Kurulum ve Yerel Çalıştırma
### Gereksinimler
- PHP >= 8.2
- Composer
- Git

### Adım Adım Kurulum
1. **Depoyu klonlayın:**
   ```bash
   git clone [https://github.com/KULLANICI_ADINIZ/laravel-task-api.git](https://github.com/KULLANICI_ADINIZ/laravel-task-api.git)
   cd laravel-task-api
