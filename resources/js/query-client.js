export class QueryClient {
    static states = {};
    static instance;
    static subscribers = {};

    static subscribe(queryKey, queryFn) {
        if (!this.subscribers[queryKey]) {
            this.subscribers[queryKey] = [queryFn];
            this.states[queryKey] = "idle";
        } else {
            this.subscribers[queryKey].push(queryFn);
        }
    }

    static async publish(key) {
        this.states[key] = "pending";
        await Promise.all(
            this.subscribers[key]?.map(async (subscriber) => {
                return subscriber();
            })
        );
        this.states[key] = "idle";
    }

    static isPending(key) {
        return this.states[key] === "pending";
    }
}
