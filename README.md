# API Documentation
Product and category management, a product can belong to a category and the category can have hierarchical structure.

## Resource

1. [Category](#Category)
1. [Product](#Product)

```json
{
    "data": [
        {
            "id": 2,
            "name": "fruits",
            "product": {
                "data": [
                    {
                        "id": 25,
                        "name": "Banana",
                        "image": "banana-2019085304.jpg",
                        "category_id": 2,
                        "created_at": "2019-12-11T08:34:07.000000Z"
                    },
                    {
                        "id": 26,
                        "name": "Grape",
                        "image": "grape-2019114258.jpg",
                        "category_id": 2,
                        "created_at": "2019-12-11T11:42:59.000000Z"
                    }
                ]
            }
        }
    ]
}
```

## Category

| Method      | Route                                                                    | Parameter | Notes             |
| ----------- | ------------------------------------------------------------------------ | :-------: | ----------------- |
| `GET`       | [`api/v1/category`](https://giftano.herokuapp.com/api/v1/category)       |           | List all resource |
| `GET`       | [`api/v1/category/:id`](https://giftano.herokuapp.com/api/v1/category/1) |   `id`    |                   |
| `POST`      | [`api/v1/category/:id`](https://giftano.herokuapp.com/api/v1/category)   |   `id`    |                   |
| `PUT/PATCH` | [`api/v1/category/:id`](https://giftano.herokuapp.com/api/v1/category/1) |   `id`    |                   |
| `DELETE`    | [`api/v1/category/:id`](https://giftano.herokuapp.com/api/v1/category/1) |   `id`    |                   |

## Product

| Method      | Route                                                                  | Parameter | Notes |
| ----------- | ---------------------------------------------------------------------- | :-------: | ----- |
| `GET`       | [`api/v1/product`](https://giftano.herokuapp.com/api/v1/product)       |           |       |
| `GET`       | [`api/v1/product/:id`](https://giftano.herokuapp.com/api/v1/product/1) |   `id`    |       |
| `POST`      | [`api/v1/product/:id`](https://giftano.herokuapp.com/api/v1/product)   |   `id`    |       |
| `PUT/PATCH` | [`api/v1/product/:id`](https://giftano.herokuapp.com/api/v1/product/1) |   `id`    |       |
| `DELETE`    | [`api/v1/product/:id`](https://giftano.herokuapp.com/api/v1/product/1) |   `id`    |       |
