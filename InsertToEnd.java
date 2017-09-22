import java.util.Arrays;
import java.util.Scanner;
public class InsertToEnd {
    public static void main(String[] args)
    {
        Scanner input = new Scanner(System.in);
        int[] array = {1, 2, 3, 4, 5, 6, 7, 8};
        int[] array2 = new int[array.length + 1];
        System.out.println("What number should be inserted into the end? ");
        int newNum = input.nextInt();
        array2[array.length] = newNum;
        for(int i = 0; i < array.length; i++)
        {
            array2[i] = array[i];
        }
        System.out.println("Original array: \t"+ Arrays.toString(array));
        System.out.println("New array: \t\t\t"+Arrays.toString(array2));
    }
}