import operations.Operators;
import java.util.Scanner;

public class SpecificCalc {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        System.out.println(Operators.factorial(7));
        System.out.println(Operators.subfactorial(7));
    }
}