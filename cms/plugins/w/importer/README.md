# Importer

## Installation

1. Copy files to `plugins/w/importer` directory
2. Requirement of `w.seeder` plugin,

***Very important***  
`w.seeder` plugin has to have the newest version, otherwise, importer will not work as you expect. So be sure to check
out https://gitlab.com/wezeo/ocms-private-plugins/w.git repository

## Backend Page

After installing this plugin, you can go to `backend\w\importer\import` backend page, or simply click on Import in
backend navigation header. In this page, you have to upload CSV file, or files (order is important, because in this
order your data will be imported to database, so if some of your file depends on another, it should go after it). Then
click Import to import your data from uploaded files. There is also TextArea field, which is available only for
superusers. There you can specify model aliases in JSON format, so you don't have to interact with file configuration.

## Model Aliases

If you want to import data, models you use, have to have properly set up aliases throughout config file, or at runtime
from backend page, which looks like this `"lesson" => "LibFeature\Lesson\Models\Lesson"`. Now in your sheets you can
use `$lesson`, which will corresponds to `LibFeature\Lesson\Models\Lesson` model

## Sheet Format

First row in your sheet have to be header. Header format is following:  
`description $model.attribute[meta]`,  
where:

- Description is optional (example: `Name of this lesson`)
- Model is properly aliased model (example: `$lesson`)
- Attribute is attribute of the model, can be also relation (example: `slug`)
- Meta is optional additional information what is supposed to happen to the column, if nothing is supposed to happen,
  don't write brackets

### Meta options

- [ignore] - column will be ignored, and you can use it only to visualize data in your sheets
- [slug] - used for relations that are connected through slug, example `$lesson.course[slug]` - find course which has
  given slug and set relationship between this lesson and that course
- [id] - same as with slug, but given value is id
- [file] - used for attaching files, as a value you have to include url of that file, example `$lesson.avatar[file]`
- [slugs] - same as with slug, but this is for multi relations, so `$course.lessons[slugs]` and as a value will be slugs
  of lessons separated with comma
- [ids] - same as with slugs
- [files] - for multi files, urls are separated with comma

Sheet header can have definition for multiple models, so you can have lesson and course in one sheet, and also in one
row if you really want, the only rule is that, whatever model will have the first column, will be imported as a first.
Every empty cell will also be converted to null

### !SHEET splitter

In your sheets, you can also include !SHEET splitter which will split content of a file into sub-sheets. The next row
have to contain new header, and then you can import completely different data example:

```
1. $course.slug | $course.name
2.   backend    | Learn Backend
3.   frontend   | Learn Frontend
4.   !SHEET     |              
5. $lesson.slug | $lesson.name
6.     php      | This lesson learns php
7.    vue       | This lesson learns vue
```

Sheet above will create 2 courses, reset header, and than create 2 lessons

### Events

- `w.importer.beforeImport` - will fire before import, event before data are processed
- `w.importer.import` - will fire after import, processed models are sent as an argument
- `w.importer.beforeSave` - will fire before model is saved, you can do a lot of logic here example

```php
Event::listen('w.importer.beforeSave', function ($model, $modelData) {
    if ($model instanceof \LibFeature\Course\Models\Course) {
        $model->user = auth()->user();
    }
    if ($model instanceof \LibFeature\Lesson\Models\Lesson) {
         return false;
    }
});
```

In the example above, we rejected to save Lesson models, because we returned false, from the callback, and also we set
up user for before we saved course