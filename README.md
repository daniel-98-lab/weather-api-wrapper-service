# weather-api-wrapper-service
Weather API that fetches and returns weather data.
Challenge from [weather-api-wrapper-service](https://roadmap.sh/projects/weather-api-wrapper-service)

## Features
- **Fetch** weather data for specific locations and date ranges.
- **Caches** responses for 1 hour using Redis.
- **Handles** errors gracefully and provides detailed error messages
- **Allow** specifying units for weather date through query parameters
- **Implement rate limiting** to prevent too many post

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/daniel-98-lab/weather-api-wrapper-service
    cd weather-api-wrapper-service
    ```

2. Initiate and execute the defined Docker-Compose services
    ```bash
    docker compose up -d
    ```

## Examples

1. Fetching Weather Data for Madrid

```bash
http GET http://www.weather-api-service.local.com/api/weather/madrid/2025-01-01/2025-01-28?unitGroup=uk
```

2. Missing unitGroup Query Parameter

```bash
http GET http://www.weather-api-service.local.com/api/weather/madrid/2025-01-01/2025-01-28
```

3. Date Range Partially Missing

```bash
http GET http://www.weather-api-service.local.com/api/weather/madrid/2025-01-01
```


## Additionally
configure the following API details in your `.env` file:

```env
VISUALCROSSING_API_KEY=your_visualcrossing_api_key
VISUALCROSSING_URL="https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline"
```
