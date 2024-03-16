package operations;

public class Operators {
    public static long factorial(int number){
        long result = 1;
        for (int i = 1; i <= number; i++) {
            result *= i;
        }
        return result;
    }

    public static double subfactorial(int number){
        double result = 0;

        for (int k = 0; k <= number; k++){
            result += (Math.pow(-1,k))/factorial(k);
        }

        return Math.round(factorial(number)*result);
    }
}
