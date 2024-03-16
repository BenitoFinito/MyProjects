import java.util.Scanner;

public abstract class Game implements Action {
    Scanner input = new Scanner(System.in);
    protected double points;
    public abstract void Round();
}
