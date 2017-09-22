import java.util.Arrays;
import java.util.Scanner;
public class InsertToArray1 {
    public static void main(String[] args)
    {
        Scanner input = new Scanner(System.in);
        int[] array = {1, 2, 3, 4, 5, 6, 7, 8};
        int[] array2 = new int[array.length + 1];
        System.out.println("What integer do you want to insert? ");
        int newNum = input.nextInt();
        int index = 0;
        do
        {
            System.out.println("What index do you want to make it? ");
            index = input.nextInt();
            if(index >= array.length+1)
            {
                System.out.println("Index is too large/invalid.");
            }
        }while(index >= array.length+1);
        for(int i = 0; i < array2.length; i++)
        {
            if(i < index)
            {
                array2[i] = array[i];
            }
            else if(i == index)
            {
                array2[i] = newNum;
            }
            else
            {
                array2[i] = array[i-1];
            }
        }
        System.out.println("Original array: \t"+ Arrays.toString(array));
        System.out.println("New array: \t\t\t"+Arrays.toString(array2));
    }
}