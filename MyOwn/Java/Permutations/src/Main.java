import java.util.Scanner;
//import java.math.BigInteger;
import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;

public class Main {
    static int combination_count = 0;
    static int CODE_LENGTH;
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        System.out.println("Podaj ciąg znaków, a wypiszę tobie wszystkie możliwe kombinacje pozycji tych znaków:\nUWAGA!! WIĘCEJ NIŻ 10 ZNAKÓW, MOŻE SPOWODOWAĆ PROBLEMY Z MIEJSCEM NA DYSKU!!!");
        String code = in.next();
        String combination = "";
        CODE_LENGTH = code.length();
        //String[] tab = new String[factorial(BigInteger.valueOf(CODE_LENGTH)).intValue()];
        try {
            BufferedWriter writer = new BufferedWriter(new FileWriter("combinations.txt"));
            permutation(code, combination, writer);
            writer.close();
            System.out.println("Wartości zapisano do pliku.");
        }catch (IOException e){
            System.err.println("Błąd podczas zapisywania do pliku: " + e.getMessage());
        }
        //saveToFile(tab);
    }

    public static void permutation(String code, String combination, BufferedWriter writer) throws IOException{
        if(combination.length() == CODE_LENGTH){
            writer.write("[" + combination_count++ + "] " + combination);
            writer.newLine();
        }
        for (int i = 0; i < code.length(); i++){
            String new_combination = combination + code.charAt(i);
            String new_code = code.substring(0,i) + code.substring(i+1);
            permutation(new_code,new_combination, writer);
        }
    }
//    public static BigInteger factorial(BigInteger number){
//        BigInteger result = BigInteger.ONE;
//        for (BigInteger i = BigInteger.valueOf(2); i.compareTo(number) <= 0; i = i.add(BigInteger.ONE)){
//            result = result.multiply(i);
//        }
//        return result;
//    }

//    public static void saveToFile(String[] tab){
//        System.out.println("Zapisuję wszystkie kombinacje do pliku combinations.txt:");
//        try {
//            BufferedWriter writer = new BufferedWriter(new FileWriter("combinations.txt"));
//            int i = 0;
//            for (String a : tab) {
//                writer.write("[" + i++ + "] => " + a);
//                writer.newLine();
//            }
//            writer.close();
//            System.out.println("Wartości zapisano do pliku.");
//        }catch (IOException e){
//            System.err.println("Błąd podczas zapisywania do pliku: " + e.getMessage());
//        }
//    }
}