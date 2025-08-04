// between useEffect and useLayoutEffect?

// useEffect runs after the DOM has been printend 
useEffect(() => {
    console.log('useEffect called'); // asynchronous
}, []);

// useLayoutEffect runs before the DOM has been painted
useLayoutEffect(() => {
    console.log('useLayoutEffect called'); // synchronous
}, []); // synchronous

// manage global state in React?
// redux, context API or Zustand

//Q1: Create a reusable React Input component with validation.

function Input({ label, value, onChange, error }) {
    return (
        <div>
            <label> {label} </label>
            <input type="text" value={value} onChange={onChange} />
            {error && <span className="error">{error}</span>}

        </div>
    );
}

//  Q2: How do you lazy load a component in React?
const Profile = React.lazy(() => import('./Profile'));

<Suspense fallback= {<Spinner />}>
    <Profile />
</Suspense>

// How do you optimize performance for a React list with 10,000 items?

// A: use React.memo to prevent unnecessary re-renders, 
// use useCallback to memoize functions,
// react-window or react-virtualized for virtualization

// Q: Laravel API with bulk user data 

//routes/api.php
Route::post('/users/bluk', [UserController::class, 'storeBulk']);

// UserController.php 
public function storeBulk(Request $request) {
    $validated = $request->validate([
        'users' => 'required|array|min:1',
    ]);

    DB::beginTransaction();
    try {
        $userData = array_map(function ($user) {
            return [
                'name' => $user['name'],
            ];
        }, $validated['users']);

        User::insert($userData);
        DB::commit();
        return response()->json(['message' => 'Users created successfully'], 201);
    }catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['error' => 'Failed to create users'], 500);
    }

}


Q: what is useMemo in React?
// A: useMemo is a React hook that memoizes the result of a computation,
// preventing expensive calculations on every render unless dependencies change.
export function useMemo(callback, dependencies) {
    const memoizedValue = React.useMemo(callback, dependencies);
    return memoizedValue;
}

reactJS higher order component list example:
function withList(WrappedComponent) {
    return function ListComponent(props) {
        const [items, setItems] = React.useState([]);

        React.useEffect(() => {
            // Fetch items from an API or other source
            fetchItems().then(data => setItems(data));
        }, []);

        return <WrappedComponent items={items} {...props} />;
    };
}

react js list of rendering process : 

