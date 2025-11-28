export class QueryClient {
    static instance;
    static subscribers = {};

    static getInstance() {
        if (!this.instance) {
            this.instance = new QueryClient();
        }
        return this.instance;
    }

    subscribe(queryKey, queryFn) {
        if (this.subscribers[queryKey]) {
            this.subscribers[queryKey] = [queryFn];
        } else {
            this.subscribers[queryKey].push(queryFn);
        }
    }

    publish(key) {
        this.subscribers[key]?.forEach((subscriber) => {
            subscriber();
        });
    }
}
