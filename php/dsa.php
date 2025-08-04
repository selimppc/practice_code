Q. Square Root with Decimal Precision Problem Statement
You are provided with two integers, 'N' and 'D'. Your objective is to determine the square root of the number 'N' with a precision up to 'D' decimal places. This implies that the discrepancy between your computed result and the correct value should be less than 10^(-D).

Example:
Input:
N = 10, D = 3
Output:
3.162
Explanation:
If N = 10 and D = 3, the resulting square root is 3.162.

Input:
The first line of the input consists of a single positive integer 'T', representing the number of test cases. Each test case will have a line with two space-separated positive integers 'N' and 'D', which correspond to the number for which you are finding the square root and the precision in decimal places required.
Output:
For each test case, output a single line with a number representing the square root of 'N' such that the precision of the result - i.e. the difference versus the true square root - is less than or equal to 10^(-D). Each test case will be output on a new line.
Constraints:
1 <= T <= 10^4
1 <= N <= 10^15
1 <= D <= 6
Time limit: 1 sec.
Note:
There is no need for manual output; simply implement the function as described, and the system will handle printing.


