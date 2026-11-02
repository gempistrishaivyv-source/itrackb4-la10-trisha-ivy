# README

## G1. Which column did you turn into a table, and why that one and not another?

I turned the `category` column into a separate `categories` table because the shoe records share the same categories, such as Sneakers, Casual, and Running. Instead of repeatedly storing category names in the shoes table, I used `category_id` to connect each shoe to its category.

## G2. What number did screenshot 6 show, and why exactly that number?

Screenshot 6 showed **6 queries**. It consisted of one query to retrieve all five shoes and five additional queries to retrieve each shoe's category separately because the relationship was loaded using lazy loading.

## G3. Your belongsTo method is named in the singular. What would break if you made it plural?

My relationship method is named `category()` because each shoe belongs to only one category. If I renamed it to `categories()`, the existing `with('category')` and `$item->category->name` references would no longer match the relationship name and would cause errors unless I updated them too.
## Author

Trisha Ivy Gempis